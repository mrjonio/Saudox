<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Endereco;

class CadastroFuncionarioTest extends TestCase
{

    private $end = factory(Endereco::class)->create([
        'estado' => 'MG',
        'cidade' => 'Joao Pinheiro',
        'ponto_referencia' => 'Favela',
    ]);

    private $array_funcionario = [
        'nome' => 'Carlos Antônio',
        'cpf' => '12345678910',
        'rg' => '12345678',
        'status' => 'Ativo',
        'login' => '12345678910',
        'password' => '123123123',
        'profissao' => 'Psicologo',
        'numero_conselho' => '123',
        'id_endereco' => $end->id,
        'telefone_1' => '12345678910',
        'telefone_2'=> '12345678911',
        'email' => 'carlosaajunior.jp@gmail.com',
        'estado_civil' => 'Solteiro',
        'nacionalidade' => 'Brasileiro',
    ];



    /** @test **/
    public function funcionarioPodeSerAdicionado(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertOk();
        $this->assertCount(1, Funcionario::all());

        $profissional = Funcionario::first();
        $resposta->assertRedirect($profissional->path());
    }

    /** @test **/
    public function nomeNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['nome'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('nome');
    }

    /** @test **/
    public function cpfNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('cpf');
    }


    /** @test **/
    public function cpfNaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '123456789AO';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('cpf');
    }

    /** @test **/
    public function cpfNaoPodeSerMenorQueOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '123456789';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('cpf');
    }

    /** @test **/
    public function cpfNaoPodeSerMaiorQueOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['cpf'] = '1234567891011';

        $resposta = $this->post('/funcionarios', $copiaFunc);
        $resposta->assertSessionHasErrors('cpf');
    }




    /** @test **/
    public function rgNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('rg');
    }

    /** @test **/
    public function rgNaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '123456SE';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('rg');
    }

    /** @test **/
    public function rgNaoPodeTerMenosQueOitoNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '1234567';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('rg');
    }

    /** @test **/
    public function rgNaoPodeTerMaisQueOitoNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['rg'] = '123456789';

        $resposta = $this->post('/funcionarios', $copiaFunc);
        $resposta->assertSessionHasErrors('rg');
    }



    /** @test **/
    public function statusNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['status'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('status');
    }

    /** @test **/
    public function statusPrecisaSerValido(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['status'] = 'status_invalido.png';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('status');
    }



    /** @test **/
    public function loginNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['login'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('login');
    }


    /** @test **/
    public function passwordNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['password'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('password');
   }

   /** @test **/
   public function passwordNaoPodeTerPoucosCaracteres(){

       $this->withoutExceptionHandling();

       $copiaFunc = $this->array_funcionario;
       $copiaFunc['password'] = '123';

       $resposta = $this->post('/funcionarios', $copiaFunc);

       $resposta->assertSessionHasErrors('password');
   }

    /** @test **/
    public function profissaoNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['profissao'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('profissao');
    }

    /** @test **/
    public function enderecoNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();


        $copiaFunc = $this->array_funcionario;
        $copiaFunc['id_endereco'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('id_endereco');
    }

    /** @test **/
    public function enderecoPrecisaExistir(){

        $this->withoutExceptionHandling();


        $copiaFunc = $this->array_funcionario;
        $copiaFunc['id_endereco'] = 666;

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('id_endereco');
    }


    /** @test **/
    public function telefoneNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function telefoneNaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '123456789DE';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function telefoneNaoPodeTerMenosDeOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '1234567891';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function telefoneNaoPodeTerMaisDeOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_1'] = '1234567890101';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_1');
    }

    /** @test **/
    public function telefone2NaoPodeTerLetras(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_2'] = '123456789DE';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_2');
    }

    /** @test **/
    public function telefone2NaoPodeTerMenosDeOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_2'] = '123456789';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_2');
    }

    /** @test **/
    public function telefone2NaoPodeTerMaisDeOnzeNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['telefone_2'] = '1234567891011';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('telefone_2');
    }

    /** @test **/
    public function emailNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['email'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('email');
    }

    /** @test **/
    public function emailPrecisaTerPontoCom(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['email'] = 'junior@gmail';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('email');
    }

    /** @test **/
    public function emailPrecisaTerArroba(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['email'] = 'juniorgmail.com';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('email');
    }

    /** @test **/
    public function nacionalidadeNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['nacionalidade'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);

        $resposta->assertSessionHasErrors('nacionalidade');
    }

    /** @test **/
    public function nacionalidadeNaoPodeTerNumero(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['nacionalidade'] = 'Brasi131r0';

        $resposta = $this->post('/funcionarios', $copiaFunc);


        $resposta->assertSessionHasErrors('nacionalidade');
    }


    /** @test **/
    public function estadoCivilNaoPodeFicarEmBranco(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['estado_civil'] = '';

        $resposta = $this->post('/funcionarios', $copiaFunc);


        $resposta->assertSessionHasErrors('estado_civil');
    }

    /** @test **/
    public function estadoCivilPrecisaSerValido(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['estado_civil'] = 'Na Pista';

        $resposta = $this->post('/funcionarios', $copiaFunc);


        $resposta->assertSessionHasErrors('estado_civil');
    }


    /** @test **/
    public function conselhoNaoPodeTerMaisDeQuatroNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['numero_conselho'] = '12345';

        $resposta = $this->post('/funcionarios', $copiaFunc);


        $resposta->assertSessionHasErrors('numero_conselho');
    }


    /** @test **/
    public function conselhoNaoPodeTerMenosQueTresNumeros(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['numero_conselho'] = '123';

        $resposta = $this->post('/funcionarios', $copiaFunc);


        $resposta->assertSessionHasErrors('numero_conselho');
    }

    /** @test **/
    public function conselhoNaoPodeTerLetra(){

        $this->withoutExceptionHandling();

        $copiaFunc = $this->array_funcionario;
        $copiaFunc['numero_conselho'] = 'Abacate';

        $resposta = $this->post('/funcionarios', $copiaFunc);


        $resposta->assertSessionHasErrors('numero_conselho');
    }
}
