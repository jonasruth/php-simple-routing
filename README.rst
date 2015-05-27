
Como Utilizar
=============

Route
-----

O que é?
~~~~~~~~

A classe ``Route`` possibilita a implementação 
de URLs Amigáveis facilmente em projetos PHP. 

Objetivo
~~~~~~~~

Ela é feita para ser simples mesmo, com possibilidade de utilizá-la
com PHP estruturado ou orientado a objetos. 

Recursos
~~~~~~~~

Apesar da simplicidade e da facilidade de uso, a classe Route permite 
que você deixe suas URLs como você quiser (ou quase), apenas escrevendo
isso num arquivo de configuração.

Não preestabelece um formato para suas URLs, você mesmo escolhe como sua 
URL vai se parecer e define o que será executado a partir dela.

Suporta que você valide os parâmetros da sua URL através de 
expressões regulares (regex). Por exemplo, se você possui um ID de um 
produto e quer que o formato dele seja de apenas dígitos, basta dizer 
que ele deve combinar com a regex '\d+'. 

Alguns exemplos do que a classe ``Route`` pode fazer:

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
Amigáveis na `Mundiali.com.br <http://www.mundiali.com.br>`_, uma loja 
virtual que já estava há algum tempo em produção. Antes as URLs 
eram algo como "http://www.mundiali.com.br/produto.php?id=9999" e
hoje são "http://www.mundiali.com.br/Produto/1130/Saca-Areia-C-Suporte-para-Guarda-Sol-e-Vara-de-Pesca".

A implantação ocorreu de forma gradativa: primeiro as páginas 
estáticas e depois as páginas dinâmicas.

Hoje o meu amigo Evantoni, CEO da Mundiali possui URLs Amigáveis e 
não precisa se preocupar com a alteração no formato das URLs, porque 
a classe Route altera os links automaticamente.


Autor
=====

    | Jonas Ruth
    | jonasruth@gmail.com
    |
    | Facebook: Jonas Ruth
    | Google+:  Jonas Ruth
    | Instagram: @jonas.ruth
