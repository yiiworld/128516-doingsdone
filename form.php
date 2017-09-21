<div class="modal">
    <button class="modal__close"  type="button" name="button" >Закрыть</button>

    <h2 class="modal__heading">Добавление задачи</h2>

    <form class="form" action="index.php" method="post" enctype="multipart/form-data">
        <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup></label>
            <?=$message_name;?>
            <input class="form__input <?=$input_error_name;?>" type="text" name="name" id="name" value="<?=$_POST['name'];?>" placeholder="Введите название" >
        </div>

        <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>
            <?=$message_project;?>
            <select class="form__input form__input--select <?=$input_error_project;?>" name="project" id="project">
                <?php foreach ($project_arr as $key => $value){
                    If($key<>0) {
                        if($key == $_POST['project']){
                            Print('<option selected value="' . $key . '">' . $value . '</option>');
                        }else{
                        Print('<option  value="' . $key . '">' . $value . '</option>');
                        }
                    }};?>
            </select>
        </div>

        <div class="form__row">
            <label class="form__label" for="date">Дата выполнения <sup>*</sup></label>
            <?=$message_date;?>
            <input class="form__input form__input--date <?=$input_error_date;?>" type="date" name="date" id="date" value="<?=$_POST['date'];?>" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
        </div>

        <div class="form__row">
            <label class="form__label">Файл</label>

            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="preview" id="preview" value="<?=$_POST['preview'];?>">

                <label class="button button--transparent" for="preview">
                    <span>Выберите файл</span>
                </label>
            </div>
        </div>

        <div class="form__row form__row--controls">
            <input class="button" type="submit" name="submit" value="Добавить">
        </div>
    </form>
</div>
