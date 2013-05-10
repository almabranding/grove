<form id="mainform" action="">
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class='<?php echo ($this->list['sort'])?'sortable':'' ?>'>      
        <?php
        foreach ($this->list as $k => $w) {
            $alternate = (($k % 2) == 0) ? 'alternate-row' : '';
            $id=($k == 0)?'titleTable':$w['id'];
            echo ' <tr id="'.$id.'" class="' . $alternate . '">';
            if ($k == 0 && is_array($w)) {
                foreach ($w as $v) {
                    $style = 'width:' . $v['width'];
                    $colspan = 'colspan="' . $v['colspan'].'"';
                    echo '<th class="table-header-repeat line-left minwidth-1" style="text-transform:capitalize;' . $style . '" '.$colspan.'><a href="#">' . $v['title'] . '</a></th>';
                }
            }
            if ($k != 0 && is_array($w)) {
                foreach ($w as $k => $v) {

                    echo '<td>' . $v . '</td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>
</form>