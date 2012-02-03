
Como Utilizar
=============

Route
-----

O que é?
~~~~~~~~

A classe ``Route`` é classe PHP que possibilita a implementação 
de URLs Amigáveis. 

Objetivo
~~~~~~~~

Ela é feita para ser simples mesmo, com possibilidade de utilizá-la
com PHP estruturado ou orientado a objetos. 

Recursos
~~~~~~~~

Apesar da simplicidade e da facilidade de uso, a classe Route permite 
que você deixe suas URLs como você quiser (ou quase), apenas escrevendo
isso num arquivo de configuração.

O Route não preestabelece um formato de definição de formato de URL, 
você escolhe como sua URL deve se parecer e diz o que deve ser feito 
quando ela é acessada.

O Route suporta que você valide os parâmetros da sua URL através de 
expressões regulares (regex). Por exemplo, se você possui um ID de um 
produto e quer que o formato dele seja de apenas dígitos, basta dizer 
que ele deve combinar com a regex '\d+'. 

A classe Route pode fazer com que URLs de formatos "iguais" executem 
ações diferentes. Veja o exemplo:

    | # Visualiza o produto de ID 3570 da loja
    |
    | http://www.meusite.com/produto/cama-elastica/3570
    |
    |
    | # Mostra um formulário de edição do produto 3570
    |    
    | http://www.meusite.com/produto/editar/3570
    
Não entraremos em detalhes do código, pois o objetivo desse documento é
lhe mostrar o que a classe Route pode fazer. Continue lendo.


Demonstração
~~~~~~~~~~~~

No diretório ''/demo'' você vai encontrar algumas aplicações básicas
do roteamento e também um arquivo ``.htaccess``.


Contribuições
-------------

Sinta-se à vontade para dar ``FORK`` e escrever suas próprias linhas
de código, propor melhorias e comentar.

Necessidades
~~~~~~~~~~~~

#. Pode-se notar que o arquivo ``.htaccess`` deixa a desejar em qualidade.
   Por enquanto, a única coisa que ele faz é direcionar as requisições ao 
   arquivo ``index.php``; 

#. Os arquivos de demonstração ainda estão bagunçados, organizá-los seria 
   muito bom, faço quando puder;
  

Caso de Sucesso
===============

A classe ``Route`` foi criada com objetivo de implementar URLs
Amigáveis em uma loja virtual que já estava há algum tempo em
produção. Antes as URLs eram algo como "http://www.lojadomeuamigo.com.br/produto.php?id=9999" e
hoje são "http://www.lojadomeuamigo.com.br/Produto/1130/Saca-Areia-C-Suporte-para-Guarda-Sol-e-Vara-de-Pesca"
(o domínio real do site está sendo preservado, pois ainda não
pedi autorização).

A implantação ocorreu de forma gradativa: primeiro as páginas 
estáticas e depois as páginas dinâmicas.

Hoje, meu amigo possui URLs Amigáveis e muito flexíveis e não
precisa se preocupar com a alteração no formato das URLs porque
a classe Route altera os links automaticamente.


Autor
=====

Meu nome é Jonas Ruth. Trabalho com PHP para uma empresa de
outsourcing em Curitiba (Paraná/Brasil). Gosto muito do que faço
mas ainda não consegui explicar o que faço para minha mãe, acho
que esse é o dilema de todo profissional de TI.

    | Twitter:  @jonasruth
    |
    | Facebook: Jonas Ruth
    |
    | Google+:  Jonas Ruth
    |
    | LinkedIn: Jonas Ruth
    |
    | (uma rede social aqui): Jonas Ruth 
