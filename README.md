# MA Super Prêmios

### Principais tecnologias:

<img src="https://img.icons8.com/fluency/48/null/tailwind_css.png" width="48" height="48" /> <img src="https://laravel.com/img/logomark.min.svg" width="48" height="48" /> <img src="https://img.icons8.com/external-tal-revivo-color-tal-revivo/48/null/external-vuejs-an-open-source-javascript-framework-for-building-user-interfaces-and-single-page-applications-logo-color-tal-revivo.png"/> <img src="https://img.icons8.com/color/48/null/mysql-logo.png" width="48" height="48" /> <img src="https://brasa.org.br/wp-content/uploads/2021/02/logo-pix-icone-256.png" width="48" height="48" /> <img src="https://v2.vitejs.dev/logo.svg" width="48" height="48" />

### Uso de cada tecnologia:

* **[TailwindCSS](https://tailwindcss.com/)**: Estilização das telas e componentes
* **[Laravel](https://laravel.com/)**: Esqueleto do projeto (Modelos, Controller, Router, etc)
* **[VueJS](https://vuejs.org)**: Criação de componentes reutilizáveis e com interações em tempo real.
* **[MySQL](https://www.mysql.com/)**: Banco de dados
* **[PIX API](https://developer.itau.com.br/baas/#/)**: Integração c/ API do Itaú para compra dos números
* **[Vite](https://vitejs.dev/)**: Asset bundling p/ funcionamento adequeado do TailwindCSS

### Propósito da aplicação:

O MA Super Prêmios é uma aplicação para participação em sorteios. Você abre o site, acha um sorteio de algo que lhe interesse, seleciona quantos números da sorte você quer e então os compra usando o PIX.

### Como testar?

#### Pré-requisitos:

Tenha o XAMPP / WAMPP / algum servidor local para hospedar o banco da aplicação

#### Passo a passo:

1. Clone este repositório e o abra em um terminal
2. Rode os comandos: 
    * npm install
    * php artisan migrate (se você não tiver um banco para a aplicação, o artisan irá perguntar se você deseja criar um, selecione yes)
    * npm run dev
    * php artisan serve
    
##### Disclaimer: esta aplicação por padrão tem no seu .env configurado como como servidor o localhost, caso enfrente problemas ou queira alterar o host, altere-o no .env

 
