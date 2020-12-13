@extends('layouts.admin')
@section('content')
<main class="container pb-5 mb-5">
	<!-- Title -->
	<div class="home-title row">
		<div class="home-title_text pl-3 mr-5">
			<h1 class="mt-4 mt-sm-5 text-purple ">{{$tarea->title}}</h1>
		</div>
	</div>
	<hr>
	<!-- Tarea -->
	<div class="cursos-index cursoadmin-index mt-4">
		<!-- Card 1 -->
		<div class="col mb-4">
			<div class="card h-100 bg-yellow p-3 p-xl-4">
				<div class="home-cursos_titulo">
					<h2 class="card-title pt-1 pl-2">{{$tarea->title}}</h2>
					<h3 class="pl-2">14/02/20 a las 00:00</h3>
				</div>{}
				<hr>
				<p class="card-text">Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Reiciendis eius exercitationem voluptatibus tempora quo vitae totam sed. Temporibus placeat, labore.</p>
				<a target="_blank" class="card-text pb-3" href="">Archivo.zip</a>
				<div class="cursoadmin-index_botones d-flex">
					<a class="bg-lpurple mr-md-3" href="">Editar</a>
					<form>
						<input type="submit" class="eliminar bg-danger mr-md-3" href="" value="Eliminar">
					</form>
				</div>
			</div>
		</div>
	</div>
	<section class="entregas mt-5">
		<h1>Entregas</h1>
		<table class="table table-hover ml-4 mt-4">
			<thead class="bg-lpurple">
				<tr>
					<th scope="col">Usuario</th>
					<th scope="col">Archivo</th>
					<th scope="col">Comentario</th>
					<th scope="col">Calificación</th>
					<th scope="col">Guardar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($entregas as $entrega)
				@if($entrega->tarea_id==$tarea->id)
				<tr>
					<td>{{$entrega->user->name}}</td>
					<td>
						<a href="{{asset("entregas/$entrega->file")}}">{{$entrega->file}}</a>
					</td>
					<form action="{{route('entregas.update', $entrega->id)}}" method="POST" enctype="multipart/form-data">
						@method('PATCH')
						@csrf
						<td>
							<textarea name="comments" id="">{{$tarea->comments}}</textarea>
						</td>
						<td>
							<input type="number" min="0" max="10" name="cal" value="{{$entrega->calif}}">
						</td>
						<td>
							<input class="bg-success" type="submit" value="Guardar">
						</td>
					</form>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</section>	
</main>
@endsection