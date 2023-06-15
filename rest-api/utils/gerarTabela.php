<?php
function gerarTabela(array $noticias)
{
    $html = <<<HTML
        <!DOCTYPE html>
        <html lang="pt-BR">
        <body>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Noticía</th>
                        <th>Usuário</th>
                        <th>Data de criação</th>
                    </tr>
                </thead>
                <tbody>
    HTML;
    foreach ($noticias as $noticia) {
        $html .= <<<HTML
                <tr>
                    <td>{$noticia->id}</td>
                    <td>{$noticia->titulo}</td>
                    <td>{$noticia->conteudo}</td>
                    <td>{$noticia->usuario}</td>
                    <td>{$noticia->criacao->format('Y-m-d H:i:s')}</td>
                </tr>
        HTML;
    }
    $html .= <<<HTML
                </tbody>
            </table>
        </body>
    </html>
    HTML;

    return $html;
}
