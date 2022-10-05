<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function index($id = null)
    {
        $_GET['id'] = $id;
       
        if (is_numeric($_GET['id'])){ 
            
            $usuario = Usuarios::find($id);
        }
           
        else{
            $usuario = [];
            $usuario['id'] = -1;
            $usuario['nome'] = "";
            $usuario['email'] = "";
            $usuario['telefone'] = "";
        }  
        

        $usuarios = Usuarios::all();
        return view('usuarios.create')->with('usuarios', $usuarios)->with('usuario', $usuario);
    }

    public function  pegar_rota()
    {
        $id = $_POST['id'];
        
     
        if (isset($_POST['salvar']) == 'salvar'){
           $this->salvar();
           return redirect()->to(route('index'));
      
        }
       if(isset($_POST['atualizar']) == 'atualizar'){
         $this->atualizar($id);
         return redirect()->to(route('index'));
       
      
      }
       else {
        return redirect()->to(route('index'));
       }  
      
    }

    public function salvar()
    {
       
        #testando como os dados do formulário está chegando
        #dd($request->all());

        //Desse jeito é com parametros: public function(Request $request)
        // Usuarios::create([
        //     'nome' => $request->nome,
        //     'email' => $request->email,
        //     'telefone' => $request->telefone,

        // ]);
        
        $data = [
            'nome' => request('nome'),
            'email' => request('email'), 
            'telefone' => request('telefone'),
           
            ];
            // dd( $data);
            
            Usuarios::create($data);

        return redirect()->route('index');
    }

    public function atualizar($id)
    {
        #testando como os dados do formulário está chegando
        #dd($request->all());
        // $usuario= Usuarios::find($id);
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        Usuarios::where('id', $id)->update(['nome' =>$nome, 'email'=>$email, 'telefone'=>$telefone]);


        return redirect()->route('index');
    }

    public function deletar($id)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->delete();
        return redirect()->route('index');
    }
}
