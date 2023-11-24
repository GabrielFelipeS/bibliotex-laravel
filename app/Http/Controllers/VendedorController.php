<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vendedor;
use Exception;

class VendedorController extends Controller
{

    function cadastrarvendedor() {
        return view('Vendedor.cadastrarvendedor');
    }
     /**
     *  @param cpf 
     * @return vendedor 
     */
    public function find($cpf) {
        $vendedor = Vendedor::where('cpf', $cpf)->first();
        return $vendedor;
    }
    /**
     * @return vendedor| Retorna o vendedores baseado no codigo_vendedor
     */
    public function findAll() {
        $vendedores = Vendedor::all();
        return $vendedores;
    }
    
    public function editar() {
        if(Auth::user()->role === 'comum') {
            return redirect('/')->with('msg', 'Você não tem permissão para acessar essa página');
        }
        
        return view('Vendedor.editarvendedor');
    }

   /**
     *  @param post $request : Informações para editar
     * @return redireciona para uma página
     */
   public function update(Request $request) {
    $cpf = $request->cpf;

       DB::table('vendedores')
           ->where('cpf', $request->cpf)
           ->update([
               'codigo_vendedor' => $request->codigo_vendedor,
               'cpf' => $request->cpf,
               'nomeCompleto' => $request->nomeCompleto,
               'data_de_nascimento' => $request->data_de_nascimento,
               'nacionalidade' => $request->nacionalidade,
           ]);

       return redirect('/editarvendedor')->with('Vendedor deltado com sucesso!');
   }
 /**
     *  @param post $request : Informações para cadastrar 
     * @return redireciona para uma página
     */
  public function store(Request $request) {

      $vendedor = Vendedor::where('cpf', $request->cpf)->first();
  
      if($vendedor) {
          return redirect('/')->with('O cpf informado já foi cadastrado');
      }
  
      $vendedor = new Vendedor;
      $vendedor->cpf = $request->cpf; 
      $vendedor->nomeCompleto = $request->nomeCompleto;
      $vendedor->data_de_nascimento = date('Y-m-d', strtotime($request->data_de_nascimento));
      $vendedor->nacionalidade = $request->nacionalidade;
  
      $vendedor->save();
  
      return redirect('/')->with('Vendedor cadastrado!');
  }
     /**
     *  @param post $request : Informações para editar o vendedor
     * @return redireciona 
     */

    public function findByCodigoDoVendedor($codigo_do_vendedor) {
        $vendedor = Vendedor::where('codigo_vendedor', $codigo_do_vendedor)->first();
        
        return $vendedor;
    }

        /**
     * @return vendedores | Retorna todos os vendedores 
     */
   
    /**
     * @param cpf | Cpf do vendedor a ser deletado
     * @return null | redireciona a pagina
     */
    public function destroy($cpf) {

        Event::findOrFail($cpf)->delete();
        DB::table('vendedores')
            ->where('cpf', $cpf)
            ->delete();

        return redirect('/')->with('msg', 'Vendedor deletado com sucesso!');
    }
    

}