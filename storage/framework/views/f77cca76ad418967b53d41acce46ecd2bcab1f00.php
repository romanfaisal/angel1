
<?php $__env->startSection('title', 'Report Details'); ?>
<?php $__env->startSection('content'); ?>
<?php
$month_id="";
$year="";
$user_id=array();
$target_type_id="";
$target_unit_id="";
if(isset($_GET['month_id'])){
	$month_id=$_GET['month_id'];
}
if(isset($_GET['year'])){
	$year=$_GET['year'];
}
if(isset($_GET['user_id'])){
	$user_id=$_GET['user_id'];
}
if(isset($_GET['target_type_id'])){
	$target_type_id=$_GET['target_type_id'];
}
if(isset($_GET['target_unit_id'])){
	$target_unit_id=$_GET['target_unit_id'];
}
$si=1;
?>
     <div class="row">
    	<div class="col-sm-12">
        
<form action="<?php echo e(route('search')); ?>" method="GET">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Month</td>
    <td align="center">: </td>
    <td>   
    <select name="month_id">
    <option value='0'> All </option>
   		<?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<option value='<?php echo e($item->id); ?>' <?php if($month_id==$item->id): ?> selected='selected' <?php endif; ?>  > <?php echo e($item->month_name); ?> 
                </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
    </select>
    </td>
  </tr>
   <tr>
    <td>Year </td>
    <td align="center">: </td>
    <td>
    <select name="year">    
        <option value='0'> All </option>
   		<?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<option value='<?php echo e($item->year); ?>' <?php if($year==$item->year): ?> selected='selected' <?php endif; ?>  > <?php echo e($item->year); ?> 
                </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
    </select>	
    </select>
    
    
    </td>
  </tr>
  <tr>
    <td>User</td>
    <td align="center">: </td>
    <td>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input name='user_id[<?php echo e($item->id); ?>]' type='checkbox' value='<?php echo e($item->id); ?>' <?php if(in_array($item->id, $user_id)): ?> checked='checked' <?php endif; ?>  /> <?php echo e($item->name); ?><br/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
    </td>
  </tr>
  <tr>
    <td>Type</td>
    <td align="center">: </td>
    <td>
    <select name="target_type_id"> 
    <option value='0'> All </option>
    	<?php $__currentLoopData = $load_target_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load_target_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
               $tree_view="= = = = = = = =>";
            ?>
            <option  value="<?php echo e($load_target_cat->id); ?>" <?php if($target_type_id==$load_target_cat->id): ?> 
                                 		selected="selected" <?php endif; ?> >
                 <?php echo e($tree_view); ?> <?php echo e($load_target_cat->name); ?>

                 <?php if(count($load_target_cat->childs)): ?>
						<?php
                           	$tree_view.="= = = = = = = =>";
                            $select_id=$target_type_id;
                        ?>
                        <?php echo $__env->make('layouts.manageChild',['childs' => $load_target_cat->childs,'tree_view','select_id' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <?php endif; ?>
             </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	    	
    </select>
    </td>
  </tr>
  <tr>
    <td>Unit</td>
    <td align="center">: </td>
    <td>
    <select name="target_unit_id">
    	<option value='0'> All </option>
        <?php $__currentLoopData = $load_target_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load_target_unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
                $tree_view="= = = = = = = =>";
            ?>
            <option  value="<?php echo e($load_target_unit->id); ?>" <?php if($target_unit_id ==$load_target_unit->id): ?> selected="selected" <?php endif; ?> >
                  <?php echo e($tree_view); ?> <?php echo e($load_target_unit->name); ?>

                      <?php if(count($load_target_unit->childs)): ?>
							<?php
                               	$tree_view.="= = = = = = = =>";
                                $select_id=$target_unit_id;
                            ?>
                            <?php echo $__env->make('layouts.manageChild',['childs' => $load_target_unit->childs,'tree_view','select_id' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php endif; ?>
             </option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   	
    </select>
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td> <input name="btnSubmit" type="submit" value="Search" /></td>
  </tr>
</table>


</form>
</div>	
    </div>
 <div class="row">
    	<div class="col-sm-12">
<h2> View Target and Achivement</h2>

<table id="example" width="100%" border="1" cellspacing="0" cellpadding="0">
 <thead>
  <tr>
    <th align='center'>Si</th>
    <th  align='center'>Name</th>
    <th  align='center'>Email</th>
    <th  align='center'>Year</th>
    <th  align='center'>Month</th>
    <th  align='center'>Target Type</th>
    <th  align='center'>Target Unit </th>
    <th  align='center'>Target Amount</th>
    <th  align='center'>Achive Amount</th>
    <th  align='center'>
      (Achive Amount/Target Amount)*100
    </th>
    
  </tr>
 </thead>
 <tbody>
  <?php $__currentLoopData = $search_resault; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <tr>
    <td  align='center'><?php echo e($si++); ?></td>
    <td  align='center'> <?php echo e($item["user_name"]); ?> </td>
    <td  align='center'><?php echo e($item["user_email"]); ?></td>
    <td  align='center'><?php echo e($item["year"]); ?></td>
     <td  align='center'><?php echo e($item["month_name"]); ?></td>      
     <td  align='center'><?php echo e($item["target_type_name"]); ?></td>
	<td  align='center'><?php echo e($item["target_unit_name"]); ?></td>
    <td  align='center'><?php echo e($item["total_target_amount"]); ?></td>
	<td  align='center'><?php echo e($item["total_achievements_amount"]); ?></td>
    <td  align='center'><?php echo e($item["achive_percentage"]); ?> % </td>  
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
 
  
</tbody> 
<tfoot>

	<tr>
    	<th align='center'>Si</th>
    	<th  align='center'>Name</th>
    	<th  align='center'>Email</th>
        <th  align='center'>Year</th>
        <th  align='center'>Month</th>
    	<th  align='center'>Target Type</th>
    	<th  align='center'>Target Unit </th>
    	<th  align='center'>Target Amount</th>
    	<th  align='center'>Achive Amount</th>
    	<th  align='center'>
      		(Achive Amount/Target Amount)*100
    	</th>
  </tr>
</tfoot>
</table>
</div>	
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/search.blade.php ENDPATH**/ ?>