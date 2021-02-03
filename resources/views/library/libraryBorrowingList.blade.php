@extends('layouts.main')

@section('contents')
	<div id="area-book-list" class="area content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Library</h4>
							<!--    <p class="category">Here is a subtitle for this table</p> -->
						</div>
						<div class="content table-responsive table-full-width">
							<!-- <table class="table table-hover">  1029 hover Invalidation-->
							<table class="table">
								<thead>
									<!-- <th>ID</th> 1029 ID情報ではないため、列名を削除 -->
									<th></th>
									<th>Title</th>
									<th>Borrow Date</th>
									<th></th>
									<!-- <th>Borrower</th> -->
								</thead>
								<!-- <tbody data-toggle="modal" data-target="#returnModal"> -->
								<tbody>
									<?php foreach ($borrowingListsInfo as $key => $value): ?>
										<tr>
											<!-- <td><?//php echo $borrowingListsInfo[$key]->id; ?></td> -->
											<td><?php echo $key+1; ?></td>
											<td><?php echo $borrowingListsInfo[$key]->title; ?></td>
											<td><?php echo $borrowingListsInfo[$key]->borrow_date; ?></td>
											<td>
												<button type="button" class="btn btn-danger bookIdInfo" name="button" data-toggle="modal" data-target="#returnModal" data-bookId="<?php echo $borrowingListsInfo[$key]->bookId; ?>">
													<?php echo "Return"; ?>
												</button>
											</td>
											<!-- <td><?//php echo $borrowingListsInfo[$key]->rent_user; ?></td> -->
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
			</nav>
			<div class="copyright pull-right">
				&copy; <script>document.write(new Date().getFullYear())</script>
			</div>
		</div>
	</footer> -->

	@endsection
