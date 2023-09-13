<div class="content-header">
                            <ul class="nav-horizontal text-center">
                                 <li>
                                    <a href="/titulos"><i class="fa fa-file-text"></i> Titulos</a>
                                </li>
                                <li>
                                    <a href="/crear-titulo"><i class="fa fa-plus-circle"></i> Crear titulo</a>
                                </li>
                              <li class="active">
                                    <a href="{{ URL::to('exportador/xls') }}"><i class="fa fa-file-excel-o"></i> Descargar xls</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('exportador/xlsx') }}"><i class="fa fa-file-excel-o"></i> Descargar xlsx</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('exportador/csv') }}"><i class="fa fa-file-excel-o"></i> Descargar CSVs</a>
                                </li>
                            </ul>
                        </div>



  <div class="container">
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importador') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
      <input type="file" name="import_file" />
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <br>
      <button class="btn btn-primary">Importar</button>
    </form>
  </div>



<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
