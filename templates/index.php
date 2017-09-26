<?php require('init.php');?>
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <div class="radio-button-group">
            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio" checked="">
                <span class="radio-button__text">Все задачи</span>
            </label>

            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                <span class="radio-button__text">Повестка дня</span>
            </label>

            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                <span class="radio-button__text">Завтра</span>
            </label>

            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                <span class="radio-button__text">Просроченные</span>
            </label>
        </div>

        <label class="checkbox">
            <input id="show-complete-tasks" class="checkbox__input visually-hidden" name="show_completed"  type="checkbox"
                   
                <?php if ($_GET['show_completed']==1) {echo ('checked="checked"');} ?> >

            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>
    

    <table class="tasks">

        <?php
		
		
		

		
        foreach ( $arr_of_cases1 as $key =>$value)
		{
			if($arr_of_cases1[$key][name_user] == $_SESSION['user'])
			{
				if ($project_arr1[$_GET['tab']]['project_name']=='Все')
				{
					if ($_GET['show_completed']==0)
						{
							if ($value['execution']==0){
							?>
								<tr class="tasks__item task">
									<td class="task__select">
										<label class="checkbox task__checkbox">
											<input class="checkbox__input visually-hidden" type="checkbox" >
											<span class="checkbox__text"><?=htmlspecialchars($value['task_name']);?></span>
										</label>
									</td>
									<td class="task__date"><?=htmlspecialchars($value['date(`date_execution`)']);?></td>
					
									<td class="task__controls">
										<?php if($value['execution']==0){echo('Нет');}else{echo('Да');}?>
									</td>
								</tr>
							<?
							}
						}
						else
						{?>
							<tr class="tasks__item task <?php if ($value['execution']=='Да') echo (" task--completed")?>">
								<td class="task__select">
									<label class="checkbox task__checkbox">
										<input class="checkbox__input visually-hidden" type="checkbox" >
										<span class="checkbox__text"><?=htmlspecialchars($value['task_name']);?></span>
									</label>
								</td>
								<td class="task__date"><?=htmlspecialchars($value['date(`date_execution`)']);?></td>
				
								<td class="task__controls">
									<?php if($value['execution']==0){echo('Нет');}else{echo('Да');}?>
								</td>
							</tr>
					  <?}
				} 
				else
				{
					if ($project_arr1[$_GET['tab']]['project_name'] == $value['project_name'])
					{
						
						if ($_GET['show_completed']==0)
						{
							if ($value['execution']==0){
							?>
								<tr class="tasks__item task">
									<td class="task__select">
										<label class="checkbox task__checkbox">
											<input class="checkbox__input visually-hidden" type="checkbox" >
											<span class="checkbox__text"><?=htmlspecialchars($value['task_name']);?></span>
										</label>
									</td>
									<td class="task__date"><?=htmlspecialchars($value['date(`date_execution`)']);?></td>
					
									<td class="task__controls">
										<?php if($value['execution']==0){echo('Нет');}else{echo('Да');}?>
									</td>
								</tr>
							<?
							}
						}
						else
						{?>
							<tr class="tasks__item task <?php if ($value['execution']=='Да') echo (" task--completed")?>">
								<td class="task__select">
									<label class="checkbox task__checkbox">
										<input class="checkbox__input visually-hidden" type="checkbox" >
										<span class="checkbox__text"><?=htmlspecialchars($value['task_name']);?></span>
									</label>
								</td>
								<td class="task__date"><?=htmlspecialchars($value['date(`date_execution`)']);?></td>
				
								<td class="task__controls">
									<?php if($value['execution']==0){echo('Нет');}else{echo('Да');}?>
								</td>
							</tr>
					  <?}
					}
				}
			}
		};?>
    </table>
