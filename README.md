# 99helps

Uma plataforma que conecta pessoas à instituições, promovendo o trabalho voluntário e divulgando projetos. Acreditamos que com a colaboração de voluntários podemos tornar um mundo mais justo. Este software está sendo desenvolvido por alunos do Entra21 como projeto de conclusão de curso.


<!-- TRECHO DO CÓDIGO NILTON COM O GRAFICO E O MAPS    

    <div class="box">

        <h1>Chart.js - criando gráficos com a biblioteca Chart.js - DEMO</h1>
        <small>Arquivo com testes e demo de funcionalidades da biblioteca Chart.js criado para o tutorial do blog Web Social Dev.</small>        

        <h2>Gráfico Linha</h2>
        <small>Dados gerados com função javascript para números randômicos até 300.</small>
        
        <div class="box-chart">

            <canvas id="GraficoLine" style="width:100%;"></canvas>

            <script type="text/javascript">

                var options = {
                    responsive:true
                };

                var data = {
                    labels: ["ultimo mês", "este mês"],
                    datasets: [
                        {
                            label: "Dados primários",
                            // area
                            fillColor: "rgba(66,139,202,1)",
                            // borda da area
                            strokeColor: "rgba(220,220,220,1)",
                            // bolinhas
                            pointColor: "rgba(66,139,202,1)",
                            // borda da bolinha
                            pointStrokeColor: "#fff",
                            // hover da bolinha
                            pointHighlightFill: "rgba(66,139,202,1)",
                            // hover da borda da bolinha
                            pointHighlightStroke: "#fff",
                            data: [3,5]
                        },
                     
                    ]
                };               
                
                window.onload = function(){

                    var ctx = document.getElementById("GraficoLine").getContext("2d");
                    var LineChart = new Chart(ctx).Line(data, options);
                }  
            </script> -->


            <!-- Localizacao por Maps da ong em que está; -->
            
            <!-- <h3 class="text-center" style="color: grey">Localização da ONG</h3><br>
            <style>
               #map {
                height: 500px;
                width: 100%;
                border: 3px solid lightgrey;
            }
        </style>
        <div id="map"></div>
        <script>
            function initMap() {
                var uluru = {lat: -26.9187, lng: -49.066};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw642B70Ciimv6sw7wFiUHALYa3gOFjJA&callback=initMap">
    </script>
</div>
</div>      
</section>   -->



Limitar caracteres evento_list

	<?php 
				function limitarTexto($texto, $limite){
					$contador = strlen($texto);
					if ( $contador >= $limite ) {      
						$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
						return $texto;
					}
					else{
						return $texto;
					}
				} 

				print(limitarTexto($rs['descricao'], $limite = 25));
				?>

