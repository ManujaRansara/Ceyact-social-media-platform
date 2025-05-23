<!-- Top blue bar -->

<style>

@media only screen and (max-width: 768px) {
    #blue {
        flex-wrap: wrap;
        justify-content: space-between;
    }

    #blue div:nth-child(2) {
        flex: 1;
        font-size: 16px;
        margin-top: 10px;
    }

    #blue div:nth-child(3) {
        justify-content: center;
        margin-top: 10px;
    }

    #blue img {
        height: 30px;
        width: 30px;
    }
}

/* Media query for medium-sized screens like tablets */
@media only screen and (min-width: 769px) and (max-width: 1024px) {
    #blue div:nth-child(2) {
        font-size: 18px;
    }
}

/* Media query for larger screens like desktops */
@media only screen and (min-width: 1025px) {
    /* Add specific styles for larger screens if needed */
}
</style>



<div id="blue" style="display: flex;  padding: 10px; align-items: center;background-color:#005487;">
    <div style="flex: 1;">
        <a href="index.php" style="text-decoration: none;">
            <span style="font-size: 30px; color: white; font-weight: bold; font-family: Franklin Gothic;">ceyact</span>
        </a>
    </div>
   
    <div style="flex: 4; font-size: 20px;"> <!-- Adjusted flex value and font size for search box -->
        <form method="get" action="search.php">
        <input id="search" type="text" name="find" placeholder="Search for People" style="width: 100%;">
        </form>
    </div>
   
    <div style="flex: 1; display: flex; align-items: center; justify-content: flex-end;"> <!-- Centering and aligning items -->
        <a href="logout.php" style="text-decoration: none; color: white; font-family: tahoma; font-size: 12px; font-weight: bold;">
            Logout
        </a>

        <?php
        
        $image = ($USER['gender'] == "Female") ? "images/user_female.jpg" : "images/user_male.jpg";

        if (file_exists($USER['profile_image'])) {
            $image = $image_class->get_thumb_profile($USER['profile_image']);
        }
        ?>

        <a href="profile1.php" style="margin-left: 10px;"> <!-- Adjusted margin for spacing -->
            <img src="<?php echo $image; ?>" style="height: 40px; width: 40px; border-radius: 50%;" alt="Profile Image">
        </a>
    </div>
</div>
