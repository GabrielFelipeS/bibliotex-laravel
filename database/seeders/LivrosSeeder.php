<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserção 1
        Livro::create([
            'ISBN' => '001',
            'nomeLivro' => 'O labirinto do fauno',
            'valorLivro' => 25.0,
            'descricao' => 'Um dos filmes mais aclamados dos últimos tempos, O Labirinto do Fauno transborda das telas do cinema em obra que expande o universo de fantasia e horror da obra-prima de Del Toro',
            'nomeDaFoto' => 'media/livro1.jpg',
        ]);

        // Inserção 2
        Livro::create([
            'ISBN' => '002',
            'nomeLivro' => 'Dragões de Éter: Caçadores de Bruxas',
            'valorLivro' => 17.0,
            'descricao' => 'Caçadores de Bruxas é o início da tetralogia e como um Bardo, Raphael Draccon praticamente nos “canta” a história da criação de Nova Ether, do nascimento da Era Antiga até a tão esperada Era Nova.',
            'nomeDaFoto' => 'media/livros2.jpg',
        ]);

        // Inserção 3
        Livro::create([
            'ISBN' => '003',
            'nomeLivro' => 'A Guerra dos Tronos : As Crônicas de Gelo e Fogo',
            'valorLivro' => 21.0,
            'descricao' => 'A guerra dos tronos é o primeiro livro da série best-seller internacional As Crônicas de Gelo e Fogo, que deu origem à adaptação de sucesso da HBO, Game of Thrones.',
            'nomeDaFoto' => 'media/livros3.jpg',
        ]);

        // Inserção 4
        Livro::create([
            'ISBN' => '004',
            'nomeLivro' => 'Decifra-me',
            'valorLivro' => 60.0,
            'descricao' => 'Prepare-se para mais um livro imperdível de Tahereh Mafi, narrado sob o ponto de vista de Kenji Kishimoto, um dos personagens mais queridos pelos fãs da série Estilhaça-me. Decifra-me reúne os contos Proteja-me e Revela-me, que vão te trazer de volta ao mundo distópico de Estilhaça-me antes do desfecho triunfal da série!',
            'nomeDaFoto' => 'media/livros4.jpg',
        ]);

        // Inserção 5
        Livro::create([
            'ISBN' => '005',
            'nomeLivro' => 'A rainha vermelha',
            'valorLivro' => 45.0,
            'descricao' => 'O mundo de Mare Barrow é dividido pelo sangue: vermelho ou prateado. Mare e sua família são vermelhos: plebeus, humildes, destinados a servir uma elite prateada cujos poderes sobrenaturais os tornam quase deuses. Mare rouba o que pode para ajudar sua família a sobreviver e não tem esperanças de escapar do vilarejo miserável onde mora.',
            'nomeDaFoto' => 'media/livros9.jpg',
        ]);

        // Inserção 6
        Livro::create([
            'ISBN' => '006',
            'nomeLivro' => 'Espada de vidro',
            'valorLivro' => 47.0,
            'descricao' => 'O sangue de Mare Barrow é vermelho, da mesma cor da população comum, mas sua habilidade de controlar a eletricidade a torna tão poderosa quanto os membros da elite de sangue prateado. Depois que essa revelação foi feita em rede nacional, Mare se transformou numa arma perigosa que a corte real quer esconder e controlar.',
            'nomeDaFoto' => 'media/livros6.jpg',
        ]);

        // Inserção 7
        Livro::create([
            'ISBN' => '007',
            'nomeLivro' => 'A prisão do rei',
            'valorLivro' => 49.0,
            'descricao' => 'Mare Barrow foi capturada e passa os dias presa no palácio, impotente sem seu poder, atormentada por seus erros. Ela está à mercê do garoto por quem um dia se apaixonou, um jovem dissimulado que a enganou e traiu. Agora rei, Maven continua com os planos de sua mãe, fazendo de tudo para manter o controle de Norta - e de sua prisioneira.',
            'nomeDaFoto' => 'media/livros7.webp',
        ]);

        // Inserção 8
        Livro::create([
            'ISBN' => '008',
            'nomeLivro' => 'Trono destruído: Coletânea definitiva da série A Rainha Vermelha',
            'valorLivro' => 51.0,
            'descricao' => 'Trono destruído é uma coletânea essencial para todos os leitores da série best-seller de Victoria Aveyard que ficaram com vontade de passar mais tempo com os personagens depois do fim de Tempestade de guerra.',
            'nomeDaFoto' => 'media/livros8.jpg',
        ]);

        // Inserção 9
        Livro::create([
            'ISBN' => '009',
            'nomeLivro' => 'Um tom mais escuro de magia',
            'valorLivro' => 60.0,
            'descricao' => 'Um tom mais escuro de magia é o início de um universo de aventuras audaciosas, poder e múltiplas cidades de Londres.',
            'nomeDaFoto' => 'media/livros5.jpg',
        ]);

        // Inserção 10
        Livro::create([
            'ISBN' => '010',
            'nomeLivro' => 'A Biblioteca da Meia-Noite',
            'valorLivro' => 38.0,
            'descricao' => 'A Biblioteca da Meia-Noite é um romance incrível que fala dos infinitos rumos que a vida pode tomar e da busca incessante pelo rumo certo.',
            'nomeDaFoto' => 'media/livros10.jpg',
        ]);

        // Inserção 11
        Livro::create([
            'ISBN' => '011',
            'nomeLivro' => 'A vida invisível de Addie LaRue',
            'valorLivro' => 46.0,
            'descricao' => 'Uma vida que ninguém lembra. Um livro que ninguém esquece. Em A vida invisível de Addie LaRue, o aguardado best-seller de V.E. Schwab, conheça Addie e se perca em sua vida invisível ― porém memorável.',
            'nomeDaFoto' => 'media/livros11.jpg',
        ]);

        // Inserção 12
        Livro::create([
            'ISBN' => '012',
            'nomeLivro' => 'Corte de Nevoa e Fúria',
            'valorLivro' => 72.0,
            'descricao' => 'Por amor ela enganou a morte. Por liberdade, ela se tornará uma arma. Corte de névoa e fúria é o esperado segundo volume da saga iniciada em Corte de espinhos e rosas. Sarah J. Maas é uma verdadeira estrela: após apenas uma semana de vendas, a série Corte de Espinhos e Rosas estreou em segundo lugar na lista do New York Times.',
            'nomeDaFoto' => 'media/livros12.jpg',
        ]);

    }
}
