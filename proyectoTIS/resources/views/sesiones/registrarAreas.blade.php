@extends ('layouts.master')
@section ('contenido')

<h2>Mis Areas</h2>
                    <div class="box box-primary"></div>             
                        <table class="table table-hover">
                            <thread>
                                <tr class="bg-purple color-palette">
                                    <td>ID</td>
                                    <td>NOMBRE</td>
                                    <td>DESCRIPCION</td>
                                    <td>SUBAREAS</td>
                                </tr>
                            </thread>
                            <tbody>
                                <?php
                                foreach($areasProf as $rows) {
                                if($rows->id_subarea == null){?>
                                <tr id="<?php echo $rows->nombre_area; ?>">
                                    <td><?php echo $rows->idArea; ?></td>
                                    <td>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="hidden-xs"><?php echo $rows->nombre_area; ?><i class="fa fa-angle-down pull-right"></i></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <?php foreach($areasProf as $subareas) { ?>
                                            <?php if($rows->idArea == $subareas->id_subarea){?>
                                            <a href="#">
                                                <li><?php echo $subareas->nombre_area;?></li>
                                            </a>
                                            <?php } ?>
                                        <?php } ?>
                                        </ul>
                                    </td>
                                    <td style="width: 45%"><?php echo $rows->descripcion; ?></td>
                                    <td><a class="label label-danger"><i id="<?php echo $rows->idArea; ?>" class="fa fa-remove" ></i></a></td>
                                    <script>
                                        $areasEliminar = [];
                                        document.getElementById("<?php echo $rows->idArea; ?>").addEventListener("click", function( event ) {
                                            $areasEliminar.push(<?php echo $rows->idArea; ?>);
                                            document.getElementById("<?php echo $rows->nombre_area; ?>").style = "display:none";
                                            console.log($areasEliminar);
                                        });
                                    </script>
                                    </tr>
                                <?php }
                             } ?>
                            </tbody>
                        </table>
                    </div>
@endsection