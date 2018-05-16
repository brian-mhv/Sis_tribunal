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
                                        
                                        <div class="box box-default collapsed-box box-solid">
                                            <div class="box-header with-border" data-widget="collapse">
                                                <?php echo $rows->nombre_area; ?><i class="fa fa-angle-down pull-right"></i>
                                                <div class="box-tools">
                                                <button class="btn btn-box-tool" ></button>
                                                </div><!-- /.box-tools -->
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                            <?php foreach($areas as $subareas) {
                                                if($rows->idArea == $subareas->id_subarea){?>
                                                    <?php echo $subareas->nombre_area;?><br>
                                                <?php } 
                                            } ?>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                        
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