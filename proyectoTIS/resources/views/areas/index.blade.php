@extends ('layouts.master')
@section ('contenido')

    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
	        <div class="col-md-12">
                <h2> Areas</h2>
                    <div class="box box-primary"></div>             
                        <table class="table">
                            <thread>
                                <tr>
                                    <td>ID</td>
                                    <td>NOMBRE</td>
                                    <td>DESCRIPCION</td>
                                    <td>SUBAREAS</td>
                                </tr>
                            </thread>
                            <tbody>
                                <?php
                                foreach($areas as $rows) {
                                if($rows->id_subarea == null){?>
                                <tr>
                                    <td><?php echo $rows->idArea; ?></td>
                                    <td>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="hidden-xs"><?php echo $rows->nombre_area; ?><i class="fa fa-angle-down pull-right"></i></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <?php foreach($areas as $subareas) { ?>
                                            <?php if($rows->idArea == $subareas->id_subarea){?>
                                            <a href="#">
                                                <li><?php echo $subareas->nombre_area;?></li>
                                            </a>
                                            <?php } ?>
                                        <?php } ?>
                                        </ul>
                                    </td>
                                    <td><?php echo $rows->descripcion; ?></td>
                                    <td><a><i class="fa fa-plus" ></i></a></td>
                                    </tr>
                                <?php }
                             } ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div><!-- /.row -->
    
@endsection