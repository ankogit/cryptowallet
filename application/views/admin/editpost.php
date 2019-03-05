<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Изменение: "<?=$data['title']?>"</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/editpost/<?=$route?>" method = "post" enctype="multipart/form-data">                  
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" value="<?=$data['title']?>" type="text" name="title">
                            </div>
							<div class="form-group">
                                <label>Изображение</label>
                                <img width="300" src="/public/images/products/product_<?=$data['id']?>.png" alt="">
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="newsImg">
                            </div>
                            <div class="form-group">
                                <label>Категория:</label>
                                <input class="form-control" value="<?=$data['category']?>" type="text" name="category">
                            </div>
							<div class="form-group">
                                <label>Цена:</label>
                                <input class="form-control" type="text" name="price" value="<?=$data['price']?>">
                            </div>
                            <div class="form-group">
                                <label>Описание:</label>
                                <textarea class="form-control" cols="30" rows="10" name="descr"><?=$data['descr']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Вес:</label>
                                <input class="form-control" type="text" name="weight" value="<?=$data['weight']?>">
                            </div>
                            <div class="form-group">
                                <label>Начинка:</label>
                                <input class="form-control" type="text" name="filling" value="<?=$data['filling']?>">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>