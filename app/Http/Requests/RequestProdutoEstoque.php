<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProdutoEstoque extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //

            if($this->method() == "PUT") {
                return [
                    'titulo_produto' => ['required'],
                    'valor_produto' => ['required'],
                    'volume_tipo' => ['required'],
                    'descricao_produto' => ['required']
                ];
                
            }

            if($this->method() == "POST") {
                //required quer dizer que é obrigatorio
                //max é o tamanho máximo da string
                //regex é um aexpressão regular -^ marca o inicio e $/ marca o final \s é espaço
                return[
                 'titulo_produto' => ['required', 'string', 'max:255','regex:/^([a-zA-Zà-úÀ-Ú]|-|_|\s)+$/'],
                 'valor_produto' => ['required', 'numeric', 'max:255'],
                 'volume_tipo' => ['required','string','max:255','regex:/^([a-zA-Zà-úÀ-Ú]|-|_|\s)+$/'],
                 'descricao_produto' => ['required','string','max:255','regex:/([0-9])/']
                ];
             }
        ];
    }
}
