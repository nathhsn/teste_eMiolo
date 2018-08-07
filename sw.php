
<?php  
    if(session_status() !== PHP_SESSION_ACTIVE){
      session_start();
   };
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Star Wars</title>

        <link href="teste_eMiolo/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="teste_eMiolo/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="teste_eMiolo/dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="teste_eMiolo/vendor/morrisjs/morris.css" rel="stylesheet">
        <link href="teste_eMiolo/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="teste_eMiolo/vendor/style.css" rel="stylesheet" type="text/css">


    </head>

    <body style="background-image: url('teste_eMiolo/img/fundo1.jpg');">

        <div id="wrapper" style="background-color: #232323;">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #232323;margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="sw.php" id="sw" style="color: #fdbf07;">Star Wars</a>
                </div>

                <ul class="nav navbar-top-links navbar-right" style="background-color: #232323;">
                    <span style=" color: #fdbf07;"> <?php echo $_SESSION['user']; ?> </span>
                   <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw" style="color: #fdbf07;"></i><i class="fa fa-caret-down" style=" color: #fdbf07;"></i>
                        </a>    
                        <ul class="dropdown-menu dropdown-user"> 
                            <li><a href="login_page.php"><i class="fa fa-sign-out fa-fw" ></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>           
            </nav>    

            <div id="inicio">
                <img src="teste_eMiolo/img/star-wars.png" style="width: 220px;left: 38%;position: absolute;">
                <p class="namePlanet" style="font-size: 15px;float: left;clear: left;background-color: rgba(0,0,0,.5);
        text-align: center;margin: 100px 0 0 0; padding: 116px;"><strong>Star Wars</strong> é uma franquia do tipo space opera estadunidense criada pelo cineasta George Lucas que conta com uma série de oito filmes de fantasia científica e um spin-off. O primeiro filme foi lançado apenas com o título Star Wars em 25 de maio de 1977, e tornou-se um fenômeno mundial inesperado de cultura popular, sendo responsável pelo início da "era dos blockbusters": Super produções cinematográficas que fazem sucesso nas bilheterias e viram franquias com brinquedos, jogos, livros, etc. Foi seguido por duas sequências, The Empire Strikes Back e Return of the Jedi, lançadas com intervalos de três anos. Esta primeira trilogia segue o trio icônico: Luke Skywalker, Han Solo e Princesa Leia, que luta na Aliança Rebelde para derrubar o tirano Império Galáctico; paralelamente ocorre a jornada de Luke para se tornar um cavaleiro Jedi e a luta contra Darth Vader, um ex-Jedi que sucumbiu ao Lado Sombrio da Força e ao Imperador. </p>     
            </div>      
        </div>



                                            <!-- MENU -->

        <div class="navbar-default sidebar" role="navigation" style="background-color: #232323; float: left;">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">               
                    <li>
                        <a href="#" onclick="requestUsuarios()" style="background-color: #232323;" id="usuarios"><i class="fa fa-user fa-fw" style="color: gray;"></i><span  style="color: #fdbf07;"> Usuarios</a>
                    </li>
                    <li>
                        <a href="#" id="planets" style="background-color: #232323;"><i class="fa fa-globe fa-fw" style="color: gray;"></i><span style="color: #fdbf07;"> Planetas</a>                    
                    </li>
                    <li>
                        <a href="#" id="navesEstelares" style="background-color: #232323;"><i class="fa fa-space-shuttle fa-fw" style="color: gray;"></i><span style="color: #fdbf07;"> Naves estelares</a>
                    </li>              
                </ul>
            </div>
        </div>

                                        <!-- LOADING -->

        <div class="loader" style="display: none; position: absolute;z-index: 9999; left: 50%;top: 55%;"></div>



                                        <!-- USUARIOS -->

        <div id="dadosUsuarios" style="float: left;width: 67%;display: none; height: 80%;position: absolute;margin: 50px 0 15px 30%; padding: 20px;">

           <div class="table-responsive" style="background-color: #fdbf07;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Senha</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>



                                        <!-- Planetas -->
                                        

        <div id="planetas" style="float: left;width: 67%;display: none; height: 100%;position: absolute;margin: 50px 0 15px 285px; padding: 20px;">

            <p style="font-size: 30px;color: #fdbf07;text-align: center;font-family: monospace;">Planetas</p>

            <img src="teste_eMiolo/img/tattoinee.jpg" title="Tattoine" onclick="request('planets/1')" class="planet" style="margin-right: 70px">
            <img src="teste_eMiolo/img/alderaan.jpg" title="Alderaan" onclick="request('planets/2')" class="planet" style="margin-right: 70px">
            <img src="teste_eMiolo/img/yavin.jpg" title="Yavin IV" onclick="request('planets/3')" class="planet" style="margin-right: 70px">
            <img src="teste_eMiolo/img/hoth.png" title="Hoth" onclick="request('planets/4')" class="planet">
            <img src="teste_eMiolo/img/dagobah.jpg" title="Dagobah" onclick="request('planets/5')" class="planet" style="margin-right: 70px;clear: left;">
            <img src="teste_eMiolo/img/bespin.png" title="Bespin" onclick="request('planets/6')" class="planet" style="margin-right: 70px">
            <img src="teste_eMiolo/img/endor.jpg" title="Endor" onclick="request('planets/7')" class="planet" style="margin-right: 70px">
            <img src="teste_eMiolo/img/naboo.png" title="Naboo" onclick="request('planets/8')" class="planet">
            <img src="teste_eMiolo/img/coruscant.jpg" title="Coruscant" onclick="request('planets/9')" class="planet" style="clear:left;margin-left:105px;margin-right:70px">
            <img src="teste_eMiolo/img/kamino.jpg" title="Kamino" onclick="request('planets/10')" class="planet" style="float: left;width: 150px;margin-right:70px">
            <img src="teste_eMiolo/img/geonosis.jpg" title="Geonosis" onclick="request('planets/11')" class="planet" style="float: left;width: 150px;">
        </div>

        <div id="dadosPlanetas" style="float: left;width: 60%;background-color: #d8d8d8eb;border-radius: 10%;display: none; height: 70%;position: absolute;margin: 50px 0 15px 30%; padding: 20px;"><span class="x" style="color: white;background-color: black;padding: 5px 10px 5px 10px;border-radius: 50%;float: right;">x</span>

            <p class="namePlanet" style="text-align: center; color: black;" id="name"></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Diâmetro do planeta: </span><span style="font-size: 18px;" id="diameter"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Rotação completa em seu eixo: </span><span style="font-size: 18px;" id="rotation"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Órbita de sua estrela local: </span><span style="font-size: 18px;" id="orbital"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Gravidade: </span><span style="font-size: 18px;" id="gravity"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">População média: </span><span style="font-size: 18px;" id="population"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Clima: </span><span style="font-size: 18px;" id="climate"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Terreno: </span><span style="font-size: 18px;" id="terrain"></span></p>
        </div>


                                        <!-- NAVES ESTELARES -->

        <div id="naves" style="float: left;width: 67%;display: none; height: 100%;position: absolute;margin: 50px 0 15px 285px; padding: 20px;">

            <p style="font-size: 30px;color: #fdbf07;text-align: center;font-family: monospace;">Naves Estelares</p>

            <img src="teste_eMiolo/img/executor.png" title="Executor" onclick="request('starships/15')" class="navesEst" style="margin-right: 70px">
            <img src="teste_eMiolo/img/sentinel.png" title="Sentinel-class landing craft" onclick="request('starships/2')" class="navesEst" style="margin-right: 70px">
            <img src="teste_eMiolo/img/death.png" title="Death star" onclick="request('starships/9')" class="navesEst">

            <img src="teste_eMiolo/img/falcon.png" title="Millennium falcon" onclick="request('starships/10')" class="navesEst"  style="margin-right: 70px; clear: left;">
            <img src="teste_eMiolo/img/ywing.png" title="Y-wing" onclick="request('starships/11')" class="navesEst" style="margin-right: 70px;">
            <img src="teste_eMiolo/img/xwing.png" title="X-wing" onclick="request('starships/12')" class="navesEst">

            <img src="teste_eMiolo/img/tie.png" title="Tie advanced x1" onclick="request('starships/13')" class="navesEst" style="margin-right: 70px;clear: left;">
            <img src="teste_eMiolo/img/slave.png" title="Slave 1" onclick="request('starships/21')" class="navesEst">
            <img src="teste_eMiolo/img/imperial.png" title="Imperial shuttle" onclick="request('starships/22')" class="navesEst">
            <img src="teste_eMiolo/img/nebulo.jpg" title="Nebulon-b escort frigate" onclick="request('starships/23')" class="navesEst" style="float: left;margin-right:70px;clear: left;">       
        </div>


        <div id="dadosNaves" style="float: left;width: 60%;background-color: #d8d8d8eb;border-radius: 10%;display: none; height: 90%;position: absolute;margin: 50px 0 15px 30%; padding: 20px;"><span class="x" style="color: white;background-color: black;padding: 5px 10px 5px 10px;border-radius: 50%;float: right;">x</span>

            <p class="namePlanet" style="text-align: center; color: black;" id="namenave"></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Modelo: </span><span style="font-size: 18px;" id="model"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Classe desta nave espacial: </span><span style="font-size: 18px;" id="class"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Fabricante: </span><span style="font-size: 18px;" id="fabricante"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Custo da nave nova: </span><span style="font-size: 18px;" id="custo"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Tamanho: </span><span style="font-size: 18px;" id="length"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Número de pessoas necessárias para pilotar: </span><span style="font-size: 18px;" id="crew"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Velocidade máxima na atmosfera: </span><span style="font-size: 18px;" id="max_speed"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Classe de naves estelares: </span><span style="font-size: 18px;" id="hyperdrive_rating"></span></p>
            <p class="dadosPlanet"><span style="font-weight: bold;">Pode transportar no máximo: </span><span style="font-size: 18px;" id="cargo_capacity"></span></p>
        </div>

          


                                        <!-- SCRIPTS -->

        <script src="teste_eMiolo/vendor/jquery/jquery.min.js"></script>
        <script src="teste_eMiolo/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="teste_eMiolo/vendor/metisMenu/metisMenu.min.js"></script>
        <script src="teste_eMiolo/vendor/raphael/raphael.min.js"></script>
        <script src="teste_eMiolo/vendor/morrisjs/morris.min.js"></script>
        <script src="teste_eMiolo/data/morris-data.js"></script>
        <script src="teste_eMiolo/dist/js/sb-admin-2.js"></script>

    </body>
</html>


<script type="text/javascript">

     $('#usuarios').on('click', function(){
        $('#dadosUsuarios').show();        
        $('#planetas').css('display', 'none');   
        $('#dadosPlanetas').css('display', 'none');
        $('#naves').css('display', 'none');  
        $('#dadosNaves').css('display', 'none');   
        $('#inicio').css('display', 'none');                

    });

    $('.x').on('click', function(){
        $('#dadosPlanetas').hide();
        $('#dadosNaves').hide();
        $('#dadosUsuarios').hide();
    });

   
    $('#planets').on('click', function(){
        $('#planetas').css('display', 'block');   
        $('#naves').css('display', 'none');              
        $('#dadosNaves').css('display', 'none');   
        $('#dadosUsuarios').hide();
        $('#inicio').css('display', 'none');                 

    });

    $('#navesEstelares').on('click', function(){
        $('#naves').css('display', 'block');  
        $('#planetas').css('display', 'none');   
        $('#dadosPlanetas').css('display', 'none');  
        $('#dadosUsuarios').hide();
        $('#inicio').css('display', 'none');                 

    });

    $('#sw').on('click', function(){
        $('#planetas').css('display', 'none');   
        $('#dadosPlanetas').css('display', 'none');  
        $('#naves').css('display', 'none');              
        $('#dadosNaves').css('display', 'none');           
        $('#dadosUsuarios').hide();
        $('#inicio').css('display', 'block');                 
    });






    /* ----------------------- Request para buscar os usuarios na base -------------------------*/
    function requestUsuarios (){

        $('.loader').css('display', 'block');  

        $.ajax({                                      
            url: 'usuarios.php',                         
            type: "post",
            data: {},                 
            success: function(resp){
                var resp = JSON.parse(resp);                  
                gridUsuarios(resp);    
                $('.loader').hide(); 

            },failure: function(resp){   
                alert('erro');
            }
        });  
    };


    /* ----------------------- Criar grid com dados -------------------------*/

        function gridUsuarios (dados){

            $('.loader').css('display', 'block');  

            var tbody = $('#tbody');

            tbody.empty();

            dados.forEach(function(item, index){

                var tr = $('<tr></tr>');

                var td = '<td>' + item.nome + '</td>'+
                       '<td>' + item.login + '</td>'+
                       '<td>' + item.senha + '</td>'+
                       '<td>' + item.data_cad + '</td>';

                tr.append(td);
                tbody.append(tr);
            });
        };




    /* ----------------------- Request para buscar dados na api -------------------------*/
    function request (tipo){
        $('.loader').css('display', 'block');  

        var tipo2 = tipo.split('/');

        $.ajax({                                      
            url: 'api.php',                         
            type: "post",
            data: { TYPE: tipo},                 
            success: function(resp){
                var resp = resp.split(',');    

                if(tipo2[0] == 'planets'){
                    planets(resp);    
                }else{
                    starships(resp); 
                };

                $('.loader').hide(); 

            },failure: function(resp){   
                alert('erro');
            }
        });    
    };



    /* ----------------------- Jogar os dados da api nas div -------------------------*/
    function planets (dados){
       $('#dadosPlanetas').show();
       $('#name').text(dados[0]);
       $('#rotation').text(dados[1] + ' horas');
       $('#orbital').text(dados[2] + ' dias');
       $('#diameter').text(dados[3]  + ' km');
       $('#climate').text(dados[4]);
       $('#gravity').text(dados[5]);
       $('#terrain').text(dados[6]);
       $('#population').text(dados[7]  + ' habitantes');
    };


    /* ----------------------- Jogar os dados da api nas div -------------------------*/
    function starships (dados){
        $('#dadosNaves').show();
        $('#namenave').text(dados[0]);
        $('#model').text(dados[1]);
        $('#fabricante').text(dados[2]);
        $('#custo').text(dados[3] + ' créditos galácticos');
        $('#length').text(dados[4]  + ' metros');
        $('#max_speed').text(dados[5]);
        $('#crew').text(dados[6] + ' pessoas');
        $('#cargo_capacity').text(dados[7] + ' Kg');
        $('#hyperdrive_rating').text(dados[8]);
        $('#class').text(dados[9]);
    };

   
</script>

