    <nav>
        <h2 class="logo">JobiFy</h2>
        <div class="Nav_content">
            <ul>
                <li><a onclick="makeAppClose()" style="cursor: pointer;">Find Job</a></li> 
                <li><a onclick="makeAppOpen()" style="cursor: pointer;">Create Offer</a></li>
                <li><a href="#">Discover More</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </div>
    </nav>

    <!-- main static container -->
    <div class="container">
        <!-- --------------------------------sideBar------------------------------- -->
        <div class="L_Sidebar">
            <div class="jobify"><h4>JobiFy</h4></div>
            <div class="filter">
                <button>Show Filter</button>
            </div>
            <div class="section items">
                <div class="item" onclick="myInboxOpen()"><i class="fa-solid fa-layer-group"></i>Inbox<span class="num">3</span></div>
                <span class="item"><i class="fa-regular fa-bell"></i>Activity<span class="num">2</span></span> 
                <span class="item"><i class="fa-regular fa-calendar"></i>Schedule</span>
            </div>
            <div class="line"><div></div></div>
            <div class="section shared">
                <h4>Shared<i class="fa-solid fa-plus"></i></h4>
                <span class="item"><i class="fa-solid fa-folder"></i>Documents</span>
                <span class="item"><i class="fa-solid fa-link"></i>Links<span class="num">6</span></span>
            </div>
            <div class="section history">
                <h4>History</h4>
                <span class="item" onclick="myFavsOpen()"><i class="fa-regular fa-heart"></i>Favorites<span class="num">9</span></span>
                <span class="item"><i class="fa-solid fa-wand-magic-sparkles"></i>Recent</span>
                <span class="item"><i class="fa-regular fa-envelope"></i>Feedbacks<span class="num">1</span></span>
            </div>
            <div class="section settings">
                    <span class="item"><i class="fa-solid fa-gear"></i>Settings</span>
                    <span class="item"><i class="fa-solid fa-circle-info"></i>Help</span>
            </div>
            <div class="pf_container">
                <div class="pfp"><img src="./assets/bm.jpg" alt="PFP"></div>
                <h3>User Username<br><span>User Depa</span></h3>
                <span><i class="fa-solid fa-up-right-from-square" style="color: #1d2b3a80;"></i></span>
            </div>
        </div>
        <!-- --------------------------------Content------------------------------- -->
        <div class="content">
        <!-- --------------------------------Search------------------------------- -->
            <form id="Searchbar" method="GET">
                <input class="search" id="searchInput" type="text" name="q" placeholder="Search by Title..."></input>
                <button onclick="searchJobs()" class="searchIcon"><i class="fa-solid fa-magnifying-glass"></i></button>
                <button onclick="searchJobs()" class="view-all">View All</button>
            </form>
        <!-- --------------------------------Live Content------------------------------- -->
            <div id="Actual_Content">
                <!-- Job offers section -->
                <div id="jobOffers">
                    <h4 style="padding-bottom: 1em;">Job Offers</h4>
                    <div id="jobList" style="overflow: auto; height: 100svh;"></div>
                </div>
                
                <!-- Job details section -->
                <div id="jobDetails" style="display: none;">
                    <h4>Job Details</h4>
                    <div id="jobContent"></div>
                    <button onclick="backToJobList()">Back to Job List</button>
                </div>

            </div>
        <!-- --------------------------------Create Offer------------------------------- -->
            <div id="MakeApp" style="display: none;">
                <h4 style="margin-bottom: 1em;" >Personalize Offer</h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="cut1">
                    <label for="offer_title">Offer Title:</label><br>
                    <input type="text" id="offer_title" name="offer_title"><br>
                    <label for="file_path">File Path:</label><br>
                    <input type="text" id="file_path" name="file_path"><br>
                    <label for="duration">Duration:</label><br>
                    <input type="text" id="duration" name="duration"><br>
                    <label for="offer_description">Offer Description:</label><br>
                    <textarea id="offer_description" name="offer_description"></textarea><br>
                    <label for="skill1">1st Skill</label><br>
                    <select id="skill1" name="skill1">
                        <option value="problem-solving">problem-solving</option>
                        <option value="communication">communication</option>
                        <option value="teamwork">teamwork</option>
                        <option value="adaptability">adaptability</option>
                        <!-- Add more options here -->
                    </select><br>
                    </div>
                    <div class="cut2">
                    <label for="skill2">2nd Skill</label><br>
                    <select id="skill2" name="skill2">
                        <option value="creativity">creativity</option>
                        <option value="leadership">leadership</option>
                        <option value="time-management">time-management</option>
                        <option value="critical-thinking">critical-thinking</option>
                        <!-- Add more options here -->
                    </select><br>
                    <label for="skill3">3rd Skill</label><br>
                    <select id="skill3" name="skill3">
                        <option value="attention-to-detail">attention-to-detail</option>
                        <option value="technical-proficiency">technical-proficiency</option>
                        <option value="analytical-skills">analytical-skills</option>
                        <option value="project-management">project-management</option>
                        <!-- Add more options here -->
                    </select><br>
                    <label for="location">Location:</label><br>
                    <input type="text" id="location" name="location"><br>
                    <label for="offer_email">Offer Email:</label><br>
                    <input type="email" id="offer_email" name="offer_email"><br>
                    <label for="offer_contact">Offer Contact:</label><br>
                    <input type="text" id="offer_contact" name="offer_contact"><br>
                    <label for="salary">Salary:</label><br>
                    <input type="text" id="salary" name="salary"><br><br>
                    <input type="submit" value="Submit" name="submit">
                    </div>
                </form> 
            </div>

        </div>
    </div>

    <!-- ----------------------overlapping elements of the DOM---------------------- -->
    <!-- Favorites overlapping page -->
    <div id="FavoritesOverlap">
        <span><i class="fa-solid fa-xmark" onclick="myFavsClose()"></i></span>
        <h3>Favorites</h3>
    </div>
    <!-- Inbox -->
    <div id="inbox">
        <span><i class="fa-solid fa-xmark" onclick="myInboxClose()"></i></span>
        <h3>Mail Box</h3>
    </div>
    <!-- Overlay -->
    <div id="Overlay"></div>

    <!-- End of overlapping Elements of DOM -->

    <div class="Footer">
        <footer>
            Footer
        </footer>
    </div>


    <!--------------------- JS Scripts for Direct Handlers ------------------------->
    <!-- <script>
        // scroll animation
        function scrollToTop() {
            window.scrollTo({
            top: 0,
            behavior: 'smooth'
            });
        }
        // example wsf, this is the target object after fetching
        // const jobs = [
        //     {id: 'job1', title: 'Job 1 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 1...'},
        //     {id: 'job2', title: 'Job 2 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 2...'},
        //     {id: 'job3', title: 'Job 3 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 3...'},
        //     {id: 'job4', title: 'Job 4 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 4...'},
        //     {id: 'job5', title: 'Job 5 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 5...'},
        //     {id: 'job6', title: 'Job 6 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 6...'},
        //     {id: 'job7', title: 'Job 7 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 7...'},
        //     {id: 'job8', title: 'Job 8 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 8...'},
        //     {id: 'job9', title: 'Job 9 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus quod possimus repudiandae. Dolorum rerum magnam sunt debitis laborum ex adipisci. Veritatis quod omnis amet recusandae accusantium magni vitae doloremque?', details: 'Details for Job 9...'},
        //   ];

            // Pass the data from PHP to JavaScript
        let jobs = <?php echo json_encode($jobs); ?>;

        // Populate the job list using the data from the database
        const jobList = document.getElementById('jobList');
        function populateJobList() {
            jobList.innerHTML = '';
            jobs.forEach(job => {
                const div = document.createElement('div');
                div.textContent = job.title;
                div.onclick = () => showJobDetails(job.id);
                jobList.appendChild(div);
            });
        }
        populateJobList();
        
          function showJobDetails(jobId) {
            if (window.scrollY !== 0){
                scrollToTop();
                const job = jobs.find(job => job.id === jobId);
                document.getElementById('jobContent').textContent = job.details;
                document.getElementById('jobOffers').style.display = 'none';
                document.getElementById('jobDetails').style.display = 'block';
            }
            else {
                const job = jobs.find(job => job.id === jobId);
                document.getElementById('jobContent').textContent = job.details;
                document.getElementById('jobOffers').style.display = 'none';
                document.getElementById('jobDetails').style.display = 'block';
            }
          }
        
          function backToJobList() {
            if (window.scrollY !== 0){
                scrollToTop();
                document.getElementById('jobOffers').style.display = 'block';
                document.getElementById('jobDetails').style.display = 'none';
            }
            else {
                document.getElementById('jobOffers').style.display = 'block';
                document.getElementById('jobDetails').style.display = 'none';
            }
          }

          // this is the important part, search function :
          function searchJobs() {
            const searchQuery = document.getElementById('searchInput').value;
            if (searchQuery.length > 0) {
                fetch(`jobs.php?q=${encodeURIComponent(searchQuery)}`)
                    .then(response => response.json())
                    .then(data => {
                        jobs = data;
                        populateJobList();
                    });
            } else {
                fetch(`jobs.php`)
                    .then(response => response.json())
                    .then(data => {
                        jobs = data;
                        populateJobList();
                    });
            }
        }
    </script> -->

