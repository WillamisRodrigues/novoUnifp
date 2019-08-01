<div class="container formulario-padrao">
    <!-- Campo Pagina -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Pagina', 'Página:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-9">{!! Form::text('Pagina', null, ['class' => 'form-control']) !!}</p>
    </div>


    <!-- Campo Ticket -->
    <div class="row" style="margin-bottom: 1rem">
        <p class="col-sm-12 col-md-3">{!! Form::label('Ticket', 'Ticket:') !!}<span style="color: red">*</span></p>
        <div class="col-sm-12 col-md-9">
            {!! Form::textarea('Ticket', null, ['class' => 'form-control']) !!}
        </div>
        <!-- /.box -->
    </div>

    @section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#Ticket' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
    @endsection

    <!-- Campo Submit -->
    <div class="row">
        <p class="col-sm-12 col-md-3"></p>
        <div class="col-sm-12 col-md-9" style="padding: 0">
            <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
                Salvar Ticket</button>
            <a href="{!! route('ajudas.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i> Cancelar</a>
        </div>
    </div>
</div>
