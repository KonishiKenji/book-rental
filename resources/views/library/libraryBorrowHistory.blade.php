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
										<th>Return Date</th>
										<!-- <th>Borrowed User</th> -->
									</thead>
									<tbody data-toggle="modal">
										<!--
										 <tr>
											<td>1</td>
											<td>PHP初歩 ポケットリファレンス</td>
											<td>2018/09/09</td>
											<td></td>
											<td>user</td>
										</tr>
									 -->
									<?php foreach ($borrowingHistorysInfo as $key => $value): ?>
										<tr>
											<!-- <td><?//php echo $borrowingHistorysInfo[$key]->id; ?></td> -->
											<td><?php echo $key+1; ?></td>
											<td><?php echo $borrowingHistorysInfo[$key]->title; ?></td>
											<td><?php echo $borrowingHistorysInfo[$key]->borrow_date; ?></td>
											<td><?php echo $borrowingHistorysInfo[$key]->return_date; ?></td>
											<!-- <td><?//php echo $borrowingHistorysInfo[$key]->rent_user; ?></td> -->
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
