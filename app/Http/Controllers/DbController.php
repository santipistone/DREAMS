<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mongo;
use App\Models\User;
use App\Models\DirectConnection;
use App\Models\Ticket;
 


class DbController extends Controller
{


    public static function logged()
    {
        if (!session()->exists('id')) {
            return 0;
        }else { return 1;}
    }

    public function showLogin() {
        if (session()->exists('id')) {
            if (session()->exists('policy')) {
                return view('policy');
            } else {
                return view('home');
            }
        }else {
            return view('login');
        }
    }

    public function postLogin(Request $request)
    {
        $user = Mongo::where('username', '=', $request->email, 'password', '=', $request->password)->first();
        if (isset($user)) {
            session()->put('id', $user->_id);
            session()->put('name', $user->name);
            if ($user->policy) {
                session()->put('policy', 1);
            }
            return redirect('home');
        } else {
            return redirect('login');
        }
    }

    public function insertTicket(Request $request) {
        $id = new \MongoDB\BSON\ObjectId();
        Mongo::where('_id', '=', $this->getMyPolicy(session('id')))->first()->push('ticket', array('id' => $id, 'sender' => session('id')));
        $x = new Ticket;
        $x->id = (string) $id;
        $x->message = [$request->testo];
        $x->title = $request->title;
        $x->save();
        return $this->ticketGesture();
    }

    public function getMyPolicy($id) {
        $x = Mongo::where('farmer', 'all', [$id])->first()->id;
        return $x;
    }

    public function getFarmerForDirect() {
        $x = Mongo::where('_id', '=', session('id'))->first()->farmer;
        return view('direct_new')->with('farmer', $x);
    }

    public function ticketGesture() {
        $z = [];
        if (session()->exists('policy')) {
            $x = Mongo::where('_id', '=', session('id'), 'policy', '=', 'true')->first()->ticket;
        } else {
            $x = Mongo::where('farmer', 'all', [session('id')])->first()->ticket;
        }

        foreach ($x as $y) { 
            $k = Ticket::where('id', '=', (string) $y['id'])->first();
            $y['title'] = $k['title'];
            if (count($k['message']) == 1) {
                $y['open'] = 1;
            } else {
                $y['open'] = 0;
            }
            array_push($z, $y);
        }
        return view('ticket')->with('tickets', $z);
    }


    public function answerTicket(Request $req) {
        Ticket::where('id', '=', $req->id)->first()->push('message', $req->mex);
        $ret = (string)'/ticket/'.(string)$req->id;
        return redirect($ret);
    }

    public static function visTicket($id) {
        $x = Ticket::where('id', '=', $id)->first();
        return view('ticket_view')->with('ticket', $x);
    }

    public function logout() {
        session()->flush();
        return redirect('login');
    }

    public static function getDirectConnectionList() {
        $z = [];
        $x = Mongo::where('_id', '=', session('id'))->first()->direct_connection;
        foreach($x as $y) {
            $k = DirectConnection::where('id', '=', (string)$y['id'])->first()->message;
            array_push($z, array("id" => (string)$y['id'], "1" => $y['1'], "2"=> $y['2'],  "message" => $k));
        }
        return view('direct')->with('dm', $z);
    }

    public function addMexToDirectConnection(Request $request) {
        DirectConnection::where('id', '=', $request->id)->first()->push('message', array('Sender' => session('id'), 'Text' => $request->mex));
        return redirect('/direct/'.$request->id);
    }

    public static function getMexFromDirectConnection($id) {
        $x = DirectConnection::where('id', '=', $id)->first();
        return view('direct_view')->with('mex', $x);
    }

    public function createDirectConnection(Request $req) {
        $id = new \MongoDB\BSON\ObjectId();
        if ($req->farmer1 != $req->farmer2) {
            Mongo::where('_id', '=', session('id'))->first()->push('direct_connection', array('id' => $id, '1' => $req->farmer1, '2' => $req->farmer2));
            $x = new DirectConnection();
            $x->id = (string) $id;
            $x->message = [];
            $x->save();
            return redirect('/direct/'.$id);
        }
        else
            return redirect('/direct');

    }

    public static function getNameByID($id) {
        $x = Mongo::where('_id', '=', $id)->first()->nome;
        return $x;
    }

}

?>