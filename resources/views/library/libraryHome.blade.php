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

							<!-- 商品名での検索 -->
							<!-- <form action="{{ url('/libraryHome')}}" method="get">
								<div class="search-right">
									<label for="forSearchName" class="">BookName</label>
									<input type="text" class="form-control" name="forSearchBookName" placeholder="入力してください">
								</div>
							</form> -->
						</div>

						<div class="content table-responsive table-full-width">
							<!-- <table class="table table-hover"> table-hover:マウスを合わせると影が付くようになる -->
							<table class="table">
								<thead>
									<th class="visible-lg visible-md">ID</th>
									<!-- <th class="visible-lg visible-md">
										<?php// if ($orderById == "asc"): ?>
											<a href="{{url('/libraryHome')}}?orderById=desc">ID ▲</a>
										<?php// else: ?>
											<a href="{{url('/libraryHome')}}?orderById=asc">ID ▼</a>
										<?php// endif; ?>
									</th> -->
									<th>Title</th>
									<th>Status</th>
									<!-- <th class="">
										<?//php if ($orderByStatus == "asc"): ?>
											<a href="{{url('/libraryHome')}}?orderByStatus=desc">Status ▲</a>
										<?//php else: ?>
											<a href="{{url('/libraryHome')}}?orderByStatus=asc">Status ▼</a>
										<?//php endif; ?>
									</th> -->
								<?php if ($userName == "administrator") : ?>
									<th>Delete</th>
								<?php endif; ?>

									<!-- <th></th> -->

								</thead>
								<tbody>
								<?php foreach ($books as $key => $value): ?>
									<tr>
										<td class="visible-lg visible-md"><?php echo $key+1; ?></td>
										<!-- <td><a href="{{ url('/libraryBookEdit')}}"><?php// echo $books[$key]->name; ?></a></td> -->
										<td><a href="/libraryBookEdit/<?php echo $books[$key]->id; ?>"><?php echo $books[$key]->name; ?></a></td>
									<?php if ($books[$key]->status == 0) : ?>
										<td>
											<button type="button" class="btn btn-primary bookIdInfo" name="button" data-toggle="modal" data-target="#borrowModal" data-bookId="<?php echo $books[$key]->id; ?>">
												Avairable for Rent
											</button>
										</td>
									<?php elseif ($books[$key]->status == 1) : ?>
										<!-- <?//php if ($rentInfo[$key]->rent_user_id && $userId == $rentInfo[$key]->rent_user_id) : ?> -->
										<!-- <td>
											<button type="button" class="btn btn-danger bookIdInfo" name="button" data-toggle="modal" data-target="#returnModal" data-bookId="<?php echo $books[$key]->id; ?>">
													Return
											</button>
										</td> -->
										<!-- <//?php else : ?> -->
										<td>Renting</td>
										<!-- <?//php endif; ?> -->
									<?php else : ?>
										<td>error</td>
									<?php endif; ?>
										<?php if ($userName == "administrator") : ?>
									<form method="post" action="http://127.0.0.1:8000/library/bookDelete/<?php echo $books[$key]->id; ?>">
									{{ csrf_field() }}
										<td><button type="submit" class="btn btn-primary" name="button">Delete</button></td>
									</form>
									<?php endif; ?>
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



@endsection
