<div class="float-right dropdown mr-0">
    <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> <?php
		if (isset($_SESSION['user_name'])) {
			echo $_SESSION['user_name'] . " " . $_SESSION['user_lastname'];
		}
		?>
    </a>

    <div class="dropdown-menu px-2" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="profile.php?edit=<?php echo $_SESSION['user_id']; ?>"><i
                    class="fas fa-user-cog"></i> Profil</a>
        <a class="dropdown-item" href="includes/logout.php"><i class="fas fa-sign-out-alt"></i> Odhlásiť sa</a>
    </div>
</div>
