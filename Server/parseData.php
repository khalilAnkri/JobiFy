<script type="text/javascript">

        // scroll animation
        function scrollToTop() {
            window.scrollTo({
            top: 0,
            behavior: 'smooth'
            });
        }

        let jobs = <?php echo json_encode($jobs); ?>;

        console.log(jobs);

        const jobList = document.getElementById('jobList');
        function populateJobList(received_data) {
        jobList.innerHTML = '';
        received_data.forEach(item => {
            const div = document.createElement('div');
            // div.className = "job-card";
            div.innerHTML = `
            <div class="offer_header" style="outline:none; border:none;">
                <div class="top-right-main-header" style="outline:none; border:none;">
                    <div class="offerIcon" style="outline:none; border:none;" ><img src="${item.file_path}"/></div>
                    <div class="offer_head_text" style="outline:none; border:none;">
                        <h2>${item.offer_title}</h2>
                        <p>Hourly: ${item.salary}$ -Estimated Time: ${item.duration} Months</p>
                    </div>
                </div>
                <div class="favoritize" style="outline:none; border:none;">
                    SAVE
                </div>
            </div>
            <div class="offer_description" style="outline:none; border:none;">
                <p>${item.offer_description}</p>
            </div>
            <div class="skills" style="outline:none; border:none;">
                <p class="skill">${item.skill1}</p>
                <p class="skill">${item.skill2}</p>
                <p class="skill">${item.skill3}</p>
            <div>
            <div class="location" style="outline:none; border:none;">
                <p><span>&#x1F4CD;</span> Location: ${item.location}</p>
            </div>
            `;
            div.onclick = () => showJobDetails(item.id);
            jobList.appendChild(div);
            console.log(div);
        });
        }
        populateJobList(jobs);
        
            function showJobDetails(jobId) {
            if (window.scrollY !== 0) {
                scrollToTop();
            }
            const job = jobs.find(job => job.id === jobId);
            document.getElementById('jobContent').innerHTML = `
            <style>
                #jobContent{
                    outline:none;
                    border:none;
                }
            </style>
            <h2 class="jobTitle">${job.offer_title}</h2>
            <p class="jobInfo">Hourly: ${job.salary}$ -Estimated Time: ${job.duration} Months</p>
            <p class="jobInfo"><span>&#x1F4CD;</span> Location: ${job.location}</p>
            <p class="jobDescription">${job.offer_description}</p>
            <div class="dskills" style="outline:none; border:none;">
                <h4>Required Skills:</h4>
                <p class="dskill">${job.skill1}</p>
                <p class="dskill">${job.skill2}</p>
                <p class="dskill">${job.skill3}</p>
            </div>
            <div class="contact-us" style="outline:none; border:none;">
                <h4>Contact Us:</h4>
                <p class="jobEmail"><a href="mailto:${job.offer_email}">Email Us</a></p>
                <p class="or">Or</p>
                <p class="jobContact">${job.offer_contact}</p>
            </div>
            `;
            const jobOffers = document.getElementById('jobOffers');
            const jobDetails = document.getElementById('jobDetails');
            jobOffers.style.display = 'none';
            jobDetails.style.display = 'block';
            }
        
          function backToJobList() {
            if (window.scrollY !== 0){
                scrollToTop();
            }
                document.getElementById('jobOffers').style.display = 'block';
                document.getElementById('jobDetails').style.display = 'none';
            }

          // this is the important part, search function :
          function searchJobs() {
                fetch(`./JSON/jobs.json`)
                    .then(response => response.json())
                    .then(data => {
                        populateJobList(data);
                    });
                console.log("Data was Fetched from .json Successfuly!");
            }
</script>