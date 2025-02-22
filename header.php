<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
<form id="registrationForm" method="post" action="">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" 
         alt="Tournament Logo" class="tournament-logo">
</header>

    <div class="container">
        <div class="card">
            <h1>WarZone Royale Esports Registration</h1>
            <form id="registrationForm">

                <div class="form-group">
                    <label for="game" class="required">Game</label>
                    <select id="game" name="game" required>
                    <option value="">Select Game</option>
                    <option value="FreeFire">FreeFire</option>
                    <option value="BGMI">BGMI</option>
                    </select>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Team Information</h2>
                    <div class="form-group">
                        <label for="teamName" class="required">Team Name</label>
                        <input type="text" id="teamName" required>
                    </div>

                    <div class="form-group">
                        <label for="leaderName" class="required">Team Leader Name</label>
                        <input type="text" id="leaderName" required>
                    </div>

                    <div class="form-group">
                        <label for="leaderWA" class="required">Team Leader WhatsApp Number</label>
                        <input type="tel" id="leaderWA" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="required">Valid Email</label>
                        <input type="email" id="email" required>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Player Information</h2>
                    <div class="form-group">
                        <label for="leaderUID" class="required">Player 1 (Team Leader) UID</label>
                        <input type="text" id="leaderUID" required>
                    </div>

                    <div class="form-group">
                        <label for="player2UID" class="required">Player 2 UID</label>
                        <input type="text" id="player2UID" required>
                    </div>

                    <div class="form-group">
                        <label for="player3UID" class="required">Player 3 UID</label>
                        <input type="text" id="player3UID" required>
                    </div>

                    <div class="form-group">
                        <label for="player4UID" class="required">Player 4 UID</label>
                        <input type="text" id="player4UID" required>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Tournament Rules & Agreements</h2>
                    <div class="form-group">
                        <label for="previousParticipation" class="required">Have you participated in any of our previous tournaments?</label>
                        <select id="previousParticipation" required>
                            <option value="">Select...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agreeRules" class="required">Do you agree to follow all tournament rules and fair play policies?</label>
                        <select id="agreeRules" required>
                            <option value="">Select...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agreeFairPlay" class="required">Do you agree that any form of cheating, hacking, or abusive behavior will result in disqualification?</label>
                        <select id="agreeFairPlay" required>
                            <option value="">Select...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="joinedPlatforms" class="required">Have you joined WhatsApp, YouTube & Discord?</label>
                        <select id="joinedPlatforms" required>
                            <option value="">Select...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="terms-container">
                    <h3>Terms and Conditions</h3>
                    <p>By registering, you agree to follow all tournament rules. Any form of cheating, hacking, or misconduct will lead to immediate disqualification. Organizers have the final say in disputes.</p>
                </div>

                <div class="form-group">
                    <label for="agreeTerms" class="required">Do you agree to the Terms and Conditions?</label>
                    <select id="agreeTerms" required>
                        <option value="">Select...</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div
                >
                <form id="registrationForm" class="bg-gray-800 p-6 rounded-lg space-y-4" method="post" enctype="multipart/form-data" action="<?php echo admin_url('admin-post.php'); ?>">
                             <input type="hidden" name="action" value="esports_registration">
                             
                            <div>
                                    <label for="paymentScreenshot" class="required">Upload Payment Screenshot</label>
                                    <input type="file" id="paymentScreenshot" name="paymentScreenshot" accept="image/*" class="w-full p-2 bg-gray-700 rounded" required>
                            </div>
                </form>

                <button type="submit">
                    Register
                    <div class="loading-spinner"></div>
                </button>
            </form>
        </div>
    </div>