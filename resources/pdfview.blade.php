
<div class="container">


	<br/>

	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>


	<table>

		<tr>

			<th>No</th>

			<th>Title</th>

			<th>Description</th>

		</tr>

		@foreach ($items as $key => $item)

		<tr>

			<td></td>

			<td></td>


		</tr>

		@endforeach

	</table>

</div>