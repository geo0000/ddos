const ipEnter = document.getElementById('ip_enter');
const ipResult = document.getElementById('ip_result');

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

let resultPort = [];

if (ipEnter) {
ipEnter.addEventListener('input', (e) => {

    resultPort = [];

    const remPadding = e.target.value.split(/\r?\n/g);

    let resss = '';
    let protocolRes = [];
    let protocol;
    let protocol2 = [];
    let method;
    let methodReg;
    let result2;
    for (let k = 0; k < remPadding.length; k++) {

        if(remPadding[k].indexOf('(') !== -1) {



            let res = remPadding[k].split('(');

            // console.log(res.toString().replace(/\/ +/g, '/').split(' ,'));
            
            res = res.toString().replace(/\/ +/g, '/').split(' ,');

                for (let i = 1; i < res.length; i++) {
                        const res2 = res[i].split(', ').toString().replace(/ +/g, ' ').trim().trim().split(',').toString().split(' ').toString().trim();
                        const res3 = res2.split(',');

                        res3.forEach(item => {
                            resultPort.push(res[0].replace(/ +/g, ' ').trim() + ':' + item.replace(' ', ''));
                        })


                    }
                    
                    resultPort.forEach(item => {
                        resss = resss + ' ' + item.replace(')', '');
                    })

                
                
                if (resss.indexOf('/') !== -1) {
                    protocol = resss.split('/').toString().trim().split(', ').toString().trim().split(',tcp').toString().trim().split(',udp').toString().trim().split(', ').toString().trim();
                    protocolRes = protocol.split(',')
                }


                if (resss.indexOf('/tcp') !== -1) {
                    method = resss.split('/').toString();
                    methodReg = method.replace(/[^A-Za-zА-Яа-яЁё]/g, "").replace('tcp', 'tcp ').trim().split(' ');
                }

                
                if (protocolRes[0]) {
                    protocolRes.forEach(item => {
                        protocol2 = protocol2 + ' ' + item;
                    })
                }

                
            }
            
            else {
                ipResult.value = remPadding.toString().replace(',', ' ');
            }

            
        }

        if (protocol2[0]) {
            let result = [];
            result = new Set(protocol2.split(' '));
            result2 = Array.from(result).join(' ');

            ipResult.value = result2.replace(/\s+/g, ' ').trim()
        }
        
        else if (resss && remPadding[k].indexOf('(') !== -1) {
            ipResult.value = resss;
        }
        
        else {
            const NUM_OF_ADDRESS_PARTS = 4;

            function solution(address) {
                let addrParts = address.split('.')
                
                if (addrParts.length !== NUM_OF_ADDRESS_PARTS) {
                    return false;
                }

                for(let i = 0; i < addrParts.length; i++){

                    let currAddrPart = Number(addrParts[i]);

                    if(isNaN(currAddrPart) || currAddrPart < 0 || currAddrPart > 255) {
                        return false;
                    }
                }

                return true;
            }

            const resultArr = [];
            remPadding.join(' ').split(' ').forEach(item => {
                if (solution(item)) {
                    resultArr.push(item)
                }
            })

            // ipResult.value = remPadding.join(' ').replace(/\s+/g, ' ').trim();
            ipResult.value = resultArr.join(' ').replace(/\s+/g, ' ').trim();
        }

    
})
}

const addTcp = document.getElementById('addTcp');
const newLine = document.getElementById('newLine');
const copyBtn = document.querySelector('.bd-clipboard button');
const bombardir = document.getElementById('bombardir');
const addProtocol = document.getElementById('addProtocol');


let addProtocolArr = [];
let deleteSymb = [];
let resultProtocolArr = [];


if (addProtocol) {
    addProtocol.addEventListener('click', () => {
        deleteSymb = [];

        resultPort.forEach(item => {
            deleteSymb.push(item.replace(')', ''));
        });


        deleteSymb.forEach(item => {
            addProtocolArr.push(item.split('/')); 
        })

        resultProtocolArr = [];
        addProtocolArr.forEach(item => {
            for (let j = 0; j < item.length; j++) {
                resultProtocolArr.push(item[1].toLowerCase() + '://' + item[0])
            }
        })

        let result = new Set(resultProtocolArr);
        result2 = Array.from(result).join(' ');

        ipResult.value = result2.replace(/\s+/g, ' ').trim();
    })
}


if (bombardir) {
    bombardir.addEventListener('click', () => {

        resultPort.forEach(item => {
            deleteSymb.push(item.replace(')', ''));
        })
        
        let result = new Set(deleteSymb);
        result2 = Array.from(result).join(' ');

        ipResult.value = result2.replace(/\s+/g, ' ').trim();
    })
}

if (newLine) {
    newLine.addEventListener('click', () => {
        let ipNewLineArr = [];

        if (addTcp.className.indexOf('newLine') === -1) {
            const ipTcp = ipResult.value.split(' ');
            ipTcp.forEach((item, index) => {
                    if (item) {
                        ipNewLineArr.push('\n' + item.replace(' ', '').trim());
                    }

            })
        }

        const testArr = [];
        ipNewLineArr.forEach((el, index ) => {
            if (index === 0) {
                testArr.push(el.replace('\n', ''));
            }

            else {
                testArr.push(el);
            }
        })

        if (testArr[0]) {
            ipResult.value = testArr.join('');
        }

        else {
            ipResult.value = ipNewLineArr.join(' '); 
        }


        
    })
}


if (addTcp) {
    addTcp.addEventListener('click', () => {
        deleteSymb = [];

         if (resultPort.length) {
            resultPort.forEach(item => {
                deleteSymb.push(item.replace(')', ''));
            });

            deleteSymb.forEach(item => {
                addProtocolArr.push(item.split('/')); 
            })
    
            resultProtocolArr = [];

            
            addProtocolArr.forEach(item => {
                for (let j = 0; j < item.length; j++) {
                    if (item[1] === 'tcp') {
                        resultProtocolArr.push(item[1].toLowerCase() + '://' + item[0])
                    }
                }
            })
    
            let result = new Set(resultProtocolArr);
            result2 = Array.from(result).join(' ');
            
            ipResult.value = result2.replace(/\s+/g, ' ').trim();
        }
        
        else {
             let result = [];
            if (ipResult.value.indexOf('tcp://') !== -1 || ipResult.value.indexOf('udp://') !== -1 || ipResult.value.indexOf('http://') !== -1) {
                const regexpResult = ipResult.value.split(' ');

                regexpResult.forEach(item => {
                    if (item.indexOf('tcp://') !== -1) {
                        result.push(item);
                    }
                })
            }

            else {
                ipResult.value.split(' ').forEach(item => {
                    result.push('tcp://' + item);
                })
            } 

            ipResult.value = result.join(' ').trim();
         }

    })
}

if (ipResult) {
    ipResult.addEventListener('mouseover', () => {
        copyBtn.style.display = 'block';
    })
}

if (ipResult) {
    ipResult.addEventListener('click', () => {
        copyText(ipResult);
    })
}

if (ipResult) {
    ipResult.addEventListener('mouseout', () => {
        copyBtn.style.display = 'none';
    })
}

const copyCode = document.querySelectorAll('pre .copy');

if (copyCode) {
    copyCode.forEach(item => {
        item.style.cursor = 'pointer';
        item.parentElement.insertAdjacentHTML('afterbegin', '<div class="copyIcon"><i class="fa fa-clone" aria-hidden="true"></i></div>');

        item.addEventListener('click', (e) => {

            if (e.target.localName !== 'span') {
                copyCodeText(e.target);
                e.target.parentElement.children[0].innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
                setTimeout(()=> {
                    e.target.parentElement.children[0].innerHTML = '<i class="fa fa-clone" aria-hidden="true"></i>';
                }, 1000)
            }

            else if (e.target.localName === 'span') {
                copyCodeText(e.target.parentElement);
                e.target.parentElement.parentElement.children[0].innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
                setTimeout(()=> {
                    e.target.parentElement.parentElement.children[0].innerHTML = '<i class="fa fa-clone" aria-hidden="true"></i>';
                }, 1000)
            }

        })
    })
}


const copyIcon = document.querySelectorAll('.copyIcon');

if (copyCode) {
    copyCode.forEach(item => {
        item.addEventListener('mouseover', (e) => {
            if (e.target.localName !== 'span') {
                e.target.parentElement.children[0].style.display = 'block';
            }

            else if (e.target.localName === 'span') {
                e.target.parentElement.parentElement.children[0].style.display = 'block';
            }
        })

        item.addEventListener('mouseout', (e) => {
            if (e.target.localName !== 'span') {
                e.target.parentElement.children[0].style.display = 'none';
            }

            
            else if (e.target.localName === 'span') {
                e.target.parentElement.parentElement.children[0].style.display = 'none';
            }
        })

    })
}

const addPortsBtn = document.getElementById('addPortsBtn');
const portsInput = document.getElementById('ports');
const portsForm = document.getElementById('portsForm');

if (portsForm) {
    portsForm.addEventListener('submit', (e) => {
        e.preventDefault();
        if (portsInput.value) {
            const portsArr = portsInput.value.split(' ');
            const ipValue = ipResult.value.split(' ');

            let resultArr = [];

            ipValue.forEach(result => {
                portsArr.forEach(port => {
                    resultArr.push(result + ':' + port);
                })
            })

            ipResult.value = resultArr.join(' ');
            portsInput.value = '';
            $('#addPorts').modal('hide');
        }
    })
}


const addMhddos_proxy = document.getElementById('addMhddos_proxyBtn');
const streams = document.getElementById('streams');
const addDebug = document.getElementById('addDebug');
const mhddos_proxyForm = document.getElementById('mhddos_proxyForm');

if (mhddos_proxyForm) {

    mhddos_proxyForm.addEventListener('submit', (e) => {
        e.preventDefault();

       if (addDebug.checked) {
           ipResult.value = 'docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy:latest -t ' + streams.value + ' ' + ipResult.value + ' --debug';
        }
        
        else {

        ipResult.value = 'docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy:latest -t ' + streams.value + ' ' + ipResult.value;
       }

       $('#mhddos_proxy').modal('hide');
       
    })
}


const streams_python = document.getElementById('streams_python');
const addDebug_python = document.getElementById('addDebug_python');
const mhddos_proxyForm_python = document.getElementById('mhddos_proxyForm_python');

if (mhddos_proxyForm_python) {
    mhddos_proxyForm_python.addEventListener('submit', (e) => {
        e.preventDefault();

       if (addDebug_python.checked) {
           ipResult.value = 'python runner.py -t ' + streams_python.value + ' ' + ipResult.value + ' --debug';
        }
        
        else {

        ipResult.value = 'python runner.py -t ' + streams_python.value + ' ' + ipResult.value;
       }

       $('#mhddos_proxy_python').modal('hide');
       
    })
}


if (copyBtn) {
    copyBtn.addEventListener('click', () => {
        copyText(ipResult)
    })
}

function copyCodeText (idInput) {
    var $text_copy = $(idInput);
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($text_copy.text().trim()).select();
    document.execCommand("copy");

    resultPort = [];
}


function copyAdress (idInput) {
    var $text_copy = $(idInput);
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($text_copy.text().trim()).select();
    document.execCommand("copy");
}

function copyIp (text) {
    var $text_copy = $(text);
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($text_copy.text().trim()).select();
    document.execCommand("copy");
    alert('Скопійовано');
}

function copyText (idInput) {
    if (ipResult.value) {
        idInput.select();
        document.execCommand('copy');
        alert('Скопійовано');
    }

    else {
        alert ('Нема чого копіювати!')
    }
}