<div class="table-responsive">
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

		<table class="table table-striped table-bordered table-hover lost-and-found-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">

			<thead>
				<tr>
					<th>Item Description</th>
					<th>Date Endorsed</th>
					<th>Endorsed by</th>
					<th>Founded at</th>
					<th>Owner's Name</th>
					<th>Status</th>
					<th>Date Claimed</th>
					<th>Claimed By</th>

				</tr>
			</thead>
			<tbody id="items">
				@foreach ($lostandfoundTable as $row)
				<tr >
					<td>{{$row->item_description}}</td>
					<td>{{$row->created_at}}</td>
					<td>{{$row->endorser_name}}</td>
					<td>{{$row->founded_at}}</td>
					<td>{{$row->owner_name}}</td>
					@if ($row->status == 'Unclaimed')
					<td ><a href="#" style="color:red" id="{{$row->id}}">{{$row->status}}</a></td>
					@elseif ($row->status == 'Claimed')
					<td s><a href="#" style="color:green" id="{{$row->id}}">{{$row->status}}</a></td>
					@elseif ($row->status == 'Donated')
					<td s><a href="#" style="color:blue" id="{{$row->id}}">{{$row->status}}</a></td>
					@endif
					<td>{{$row->date_claimed}}</td>
					<td>{{$row->owner_name}}</td>

				</tr>
				@endforeach
			</tbody>

			<tfoot>
				<tr>
					<th>Item Description</th>
					<th>Date Endorsed</th>
					<th>Endorsed by</th>
					<th>Founded at</th>
					<th>Owner's Name</th>
					<th>Status</th>
					<th>Date Claimed</th>
					<th>Claimed By</th>

				</tr>
			</tfoot>
		</table>

	</div>
</div>

<script src="/js/app.js"></script>