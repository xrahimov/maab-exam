<!--Body Starts Here-->
        <div class="main">
            <div class="content">
                <div class="report">
                    <h2>Imtihonlarni boshqarish</h2>
                    <a href="<?php echo SITEURL; ?>admin/index.php?page=add_faculty">
                        <button type="button" class="btn-add">Imtihon qo'shish</button>
                    </a>
                    <?php 
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['update']))
                            {
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                            }
                        if(isset($_SESSION['delete']))
                            {
                                echo $_SESSION['delete'];
                                unset($_SESSION['delete']);
                            }
                    ?>
                    
                    <table>
                        <tr>
                            <th>S.N.</th>
                            <th>Nomi</th>
                            <th>Parol</th>
                            <th>Davomiyligi (minut)</th>
                            <th>Savollar</th>
                            <th>Aktivmi?</th>
                            <th>Actions</th>
                        </tr>
                        
                        <?php 
                            //Getting all the faculties from database
                            $tbl_name="tbl_faculty ORDER BY faculty_id DESC";
                            $query=$obj->select_data($tbl_name);
                            $res=$obj->execute_query($conn,$query);
                            $count_rows=$obj->num_rows($res);
                            $sn=1;
                            if($count_rows>0)
                            {
                                while($row=$obj->fetch_data($res))
                                {
                                    $faculty_id=$row['faculty_id'];
                                    $faculty_name=$row['faculty_name'];
                                    $parol=$row['parol'];
                                    $time_duration=$row['time_duration'];
                                    $qns_per_page=$row['qns_per_set'];
                                    $is_active=$row['is_active'];
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $faculty_name; ?></td>
                                        <td><?php echo $parol; ?></td>
                                        <td><?php echo $time_duration; ?></td>
                                        <td><?php echo $qns_per_page; ?></td>
                                        <td><?php echo $is_active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/index.php?page=update_faculty&id=<?php echo $faculty_id; ?>"><button type="button" class="btn-update">Yangilash</button></a> 
                                            <a href="<?php echo SITEURL; ?>admin/pages/delete.php?id=<?php echo $faculty_id; ?>&page=faculties"><button type="button" class="btn-delete" onclick="return confirm('Ishonchingiz komilmi?')">O'chirish</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<tr><td colspan='6'><div class='error'>Imtihon qo'shilmadi</div></td></tr>";
                            }
                        ?>
                        
                        
                    </table>
                </div>
            </div>
        </div>
        <!--Body Ends Here-->