<!-- Se Ingresan Los Mantenimientos -->
                   <!-- Inicia La seccion de usuarios -->
                   <div class="container" id="listausuarios">
                       <div class= "myform-all Color_Claro">
                        <!-- Inicia Tabla de Usuarios; -->
                        <br>
                        <h1 class="Titulos">Guias Entregadas</h1>
                        <form role="form" action="" method="post" class="">
                        <table>
                                    <tr>
                                        <th>No. Guia</th>
                                        <th>Piloto</th>
                                        <th>Placa del Camion</th>
                                        <th>Capacidad de Carga</th>
                                        <th>Rampa</th>
                                        <th>Destino</th>
                                        <th>Fecha de Carga</th>
                                        <th>Fecha de Entrega</th>
                                        <th>cantidad Cargada</th>
                                        <th>Estatus</th>
                                        <?php
                                        for ($i = 0; $i < $lista_Guias; $i++) {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $lista_Guias['ID_GUIA'];
                                            echo "</td>";

                                            echo "<td>";
                                            echo $lista_Guias['Piloto'];
                                            echo "</td>";

                                            echo "<td>";
                                            echo $lista_Guias['Placa_Camion'];
                                            echo "</td>";

                                            echo "<td>";
                                            echo $lista_Guias['Camion_Capacidad'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Rampa'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Destino'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Fecha_Carga'];
                                            echo "</td>"; 
                                            echo "<td>";
                                            echo $lista_Guias['Fecha_Entrega'];
                                            echo "</td>"; 
                                            echo "<td>";
                                            echo $lista_Guias['PesoBruto'];
                                            echo "</td>"; 
                                            echo "<td>";
                                            echo $lista_Guias['Estatus'];
                                            echo "</td>";                        
                                                    
                                            echo "</tr>";       
                                            $lista_Guias = $ejecutar_sentencia->fetch_array();
                                        }
                                        ?>
                                    </tr>
                                           
                                </table>
                        </form>
                        
                        </div>
                                    </div>
                        <!-- Finaliza Tabla de Usuarios;  -->
                        
                </div>
                
                   <!-- Fin Se Ingresan los mantenimientos -->