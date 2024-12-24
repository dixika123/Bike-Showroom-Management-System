<?php
// include('../nav.php');
include('../config/constant.php');

// Include the appropriate navigation bar based on login status
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    include('../bookingNav.php');
} else {
    include('../nav.php');
}

// Check if the user is logged in



// Function to filter negative words
function isPositiveFeedback($feedback) {
    $negativeWords = ['bad', 'poor', 'terrible', 'awful', 'worst', 'fair'];
    foreach ($negativeWords as $word) {
        if (stripos($feedback, $word) !== false) {
            return false;
        }
    }
    return true;
}
?>

<!-- middle body -->

<div class="header">
    <br>
    <h1>JAWA MOTORCYCLES</h1>
    <h3>
        <p>Inherit the Authenticity of a LEGEND</p>
    </h3>
</div>

<style>
/* CSS for slideshow and testimonials */
.slideshow-container {
    position: relative;
    max-width: 1000px;
    margin: auto;
}

.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.8s ease;
    border-radius: 0 3px 3px 0;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

.testimonial {
    margin: auto;
    width: 90%;
    position: relative;
}

.test {
    margin: auto;
    text-align: center;
}

.testimonial-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: nowrap;
    padding: 20px 0;
    width: 100%;
    overflow: hidden;
    position: relative;
}

.testimonial-card {
    background: maroon;
    color: white;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    padding: 20px;
    width: 300px;
    text-align: center;
    flex: 0 0 auto;
    transition: transform 0.5s ease, background 0.5s ease;
    position: relative;
    overflow: hidden;
}

.testimonial-card:hover {
    transform: scale(1.05);
    background: #196F3D
}

.testimonial-card::before {
    content: "“";
    font-size: 80px;
    color: rgba(255, 255, 255, 0.8);
    position: absolute;
    top: -30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 0;
}

.testimonial-content {
    font-size: 16px;
    margin: 20px 0;
    position: relative;
    z-index: 1;
}

.testimonial-author {
    font-weight: bold;
    margin-top: 10px;
    position: relative;
    z-index: 1;
}

.nav-btns {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.nav-btn {
    background-color: maroon;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav-btn:hover {
    background-color: #196F3D;
    transform: scale(1.05);
}
</style>
</head>

<body>

    <div class="slideshow-container">
        <div class="mySlides">
            <img src="../images/slider/s.jpg" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="../images/slider/s0.jpg" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="../images/slider/s11.jpg" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="../images/slider/s13.jpg" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="../images/slider/s15.jpg" style="width:100%">
        </div>
        <div class="mySlides">
            <img src="../images/slider/s6.jpg" style="width:100%">
        </div>
        <!-- Add more slides as needed -->
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>

    <br><br>
    <hr><br>

    <div class="testimonial">
        <h1 class="test">TESTIMONIALS</h1>
        <div class="testimonial-container" id="testimonialContainer">
            <?php 
                $sql = "SELECT name, email, experience FROM feedback";
                $result = $conn->query($sql);

                // Check if there are any feedbacks
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        if (isPositiveFeedback($row["experience"])) {
                            echo "<div class='testimonial-card'>";
                            echo "<div class='testimonial-content'>" . nl2br(htmlspecialchars($row["experience"])) . "</div>";
                            echo "<div class='testimonial-author'>" . htmlspecialchars($row["name"]) . "</div>";
                            echo "</div>";
                        }
                    }
                } else {
                    echo "No feedbacks available.";
                }
            ?>
        </div>
        <div class="nav-btns">
            <button class="nav-btn" id="prevBtn" onclick="moveSlides(-1)">❮</button>
            <button class="nav-btn" id="nextBtn" onclick="moveSlides(1)">❯</button>
        </div>
    </div>

    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }

    // Testimonial slider
    let currentIndex = 0;

    function moveSlides(step) {
        const container = document.getElementById('testimonialContainer');
        const testimonials = document.getElementsByClassName('testimonial-card');
        const totalTestimonials = testimonials.length;

        currentIndex += step;

        if (currentIndex < 0) {
            currentIndex = 0;
        } else if (currentIndex >= totalTestimonials) {
            currentIndex = totalTestimonials - 1;
        }

        const offset = testimonials[currentIndex].offsetLeft - container.offsetLeft;
        container.scrollTo({
            left: offset,
            behavior: 'smooth'
        });
    }
    </script>

</body>

</html>
<br><br><br>
<?php
include('../footer.php');
?>