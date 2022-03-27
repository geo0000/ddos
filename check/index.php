<?php include("../includes/head.php") ?>
	<link rel="stylesheet" href="/css/dashboard.css">
    <title>Актуальна інформація по стутусам цілей</title>
  </head>
<body>

<?php include("../includes/header.php"); ?>


<h1 class="title_h2 mb-4">Актуальна інформація по стутусам цілей</h1>

<?php

$timeJson = file_get_contents("time.json");

$oldTime = strtotime(json_decode($timeJson));
$newTime = date("H:i", strtotime('+15 minutes', $oldTime));

?>
<div class="info-block row mt-3">

	<div class="col-md-6">
		<b>Що робить цей сервіс?</b>
		<ul>
			<li>
				По кожній цілі здійснює перевірку одночасно з 21 серверу по всьому світу, в тому числі і з русні.
			</li>
			<li>
				Сервіс самостійно оновлює статуси кожні 15 хвилин.
			</li>
			<li>
				По блоку з кожною ціллю можливо клікнути і розвернеться детальна інформація по відповіді від кожного серверу окремо.
			</li>
		</ul>
	</div>	

	<div class="col-md-6">
		<b>Є загальні статуси по цілям:</b>
		<ol>
			<li>
				<b class="text-success">Доступна</b> - Більшість серверів дали позитивну відповідь, а от же Вам потрібно зосередитись перше за все на них.
			</li>
			<li>
				<b class="text-warning">Ще ворушиться</b> - Більшості серверам дало відповідь, що ціль доступна, але вже деякі сервера не змогли її отримати. Також ціль потребує Вашої уваги.
			</li>
			<li>
				<b class="text-warning">Напівжива</b> - Значна частина серверів не отримала відповіді під час перевірки цілі, але є ще досить багато серверів з позитивної відповіддю.
			</li>
			<li>
				<b class="text-danger">Померла</b> - Назва відповідає сама за себе, але не зменшуйте тиск, нам потрібно тримати її в такому стані.
			</li>
			<li>
				<b class="text-warning">Невдала</b> - Щось пішло не так при перевірці цілі. Чекайте оновлення на наступному запиті.
			</li>
		</ol>
	</div>
</div>

<?php

echo '<div class="mt-3 d-flex align-items-center"><span class="text-center"><b>Останнє оновлення:</b> ' . json_decode($timeJson) . '</span><span class="ml-3 text-center"><b>Наступне оновлення:</b> ' . $newTime . '</div>'; 

?>

<div class="control-block mt-3 row">
	<div class="col-md-4">
		<h6><b>Показати цілі:</b></h6>
		<div class="btn-group">
			<button class="btn btn-secondary btn-sm" id="allTargetBtn">Всі цілі<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span></button>
			<button class="btn btn-sm btn-secondary" id="onlyAccess">Тільки живі<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span></button>
		</div>
	</div>

	<div class="col-md-4">
		<h6><b>Копіювання цілей:</b></h6>
		<div class="btn-group">
			<button class="btn btn-primary btn-sm" id="copyAllTarget">Всі цілі<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span></button>
			<button class="btn btn-sm btn-primary" id="copyOnlyAccess">Тільки живі<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span></button>
		</div>
	</div>
</div>

<div class="accordion" id="block-result">

</div>





<script>
	const resultBlock = document.getElementById('block-result');

const getId = async () => {
	let response = await fetch('ids.json');

	if (response.ok) { 
		let json = await response.json();

		return json;

		} else {
		alert("Ошибка HTTP: " + response.status);
	}
}


const getDomains = async () => {
	let response = await fetch('domains.json');

	if (response.ok) { 
	let json = await response.json();

	



	json.forEach((domain, index) => {
		// domainReplace = domain.replace(/[.://]/g, '_');
		
		resultBlock.insertAdjacentHTML('beforeend', `<div class="dashboard card"><div class="card-header" id="heading${index}"><h2 class="mb-0"><button class="btn collapse-btn btn-link d-flex btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse${index}" aria-expanded="true" aria-controls="collapse${index}">${domain}</button></h2></div><div id="collapse${index}" class="collapse" aria-labelledby="heading${index}" data-parent="#block-result"><div class="card-body"></div></div></div>`)
	})
	
	let idArr = getId().then(data => {
		let resultData = Object.values(data);
		
		let dataDomainArr = [];
		let statusOk = [];
		let statusErr = [];

		let countriesArr = [];

		getServices().then(countries => {
			countries.forEach((country, ind) => {
				if (country.nodes) {
					countriesArr.push(Object.values(country.nodes))
				}
			})


			resultData.forEach((dataDomain, index) => {
				const statusBlock = document.querySelector(`[data-target="#collapse${index}"]`);
				const detailBlock = document.querySelector(`#collapse${index} .card-body`);

				// console.log(index, dataDomain);
				
				
				if (dataDomain) {
					Object.values(dataDomain).forEach((item, ind) => {

						
						if (item[0] && item[0].time || item[0] && item[0].error || item[0] && item[0][0] === 1 || item[0] && item[0][0] === 0) {
							
							
							if (item[0].time) {
								statusOk.push(item[0].time)
								
								if (countries[index]) {
									const text = `<p class="success ml-auto status_target"><span class="country">Сервер: ${countries[index][ind]}</span> <span class="target_response text-success">Ціль відповідає.</span> Швидкість відповіді: ${item[0].time}</p>`;
									detailBlock.insertAdjacentHTML('beforeend', text);
								}

							}
							
							else if (item[0].error) {
								statusErr.push(item[0].error);
								if (countries[index]) {
									const text = `<p class="danger ml-auto status_target"><span class="country">Сервер: <span>${countries[index][ind]}</span></span> <span class="target_response text-danger">Ціль не відповідає:</span> ${item[0].error}</p>`;
									detailBlock.insertAdjacentHTML('beforeend', text);
								}

							}

							else if (item[0][0] === 1) {
								statusOk.push(item[0][0]);
								if (countries[index]) {
									const text = `<p class="success ml-auto status_target"><span class="country">Сервер: ${countries[index][ind]}</span> <span class="target_response text-success">Ціль відповідає.</span> Швидкість відповіді: ${item[0][1].toFixed(4)}</p>`;
									detailBlock.insertAdjacentHTML('beforeend', text);
								}
							}

							else if (item[0][0] === 0) {
								statusErr.push(item[0][0]);
								if (countries[index]) {
									const text = `<p class="danger ml-auto status_target"><span class="country">Сервер: <span>${countries[index][ind]}</span></span> <span class="target_response text-danger">Ціль не відповідає:</span> ${item[0][2]}</p>`;
									detailBlock.insertAdjacentHTML('beforeend', text);
								}
							}
						}
						
						else {
							if (item && item[0] && item[0][0]) {
								if (item[0][0][0] === 'OK') {
									statusOk.push([item[0][0][0]]);
								}
							

								else {
									statusErr.push(item[0][0][0]);
								}
							}
						}
					})
				}

				// console.log(index, statusOk);
				// console.log(index, statusErr);

				if (statusOk.length > statusErr.length && statusOk.length >= 14 ) {
					const text = `<span class="copy">${statusBlock.textContent}</span><span class="status success ml-auto" data-toggle="tooltip" data-title="Більшості серверам дало позитивну відповідь по цій цілі.">Доступна</span><span class="ml-3 target-arrow"><i class="fas fa-angle-down"></i></span>`;
					statusBlock.innerHTML = text;
				}

				if (statusOk.length === statusErr.length && statusOk.length !== 0 || statusErr.length >= 10 && statusOk.length >= 7) {
					const text = `<span class="copy">${statusBlock.textContent}</span><span class="status warning ml-auto" data-toggle="tooltip" data-toggle="tooltip" data-title="Значна частина серверів не отримала відповіді під час перевірки цілі, але є ще досить багато серверів з позитивної відповіддю">Напівжива</span><span class="ml-3 target-arrow"><i class="fas fa-angle-down"></i></span>`;
					statusBlock.innerHTML = text;
				}

				else if (statusErr.length > 6 && statusOk.length > 6) {
					const text = `<span class="copy">${statusBlock.textContent}</span><span class="status warning ml-auto" data-toggle="tooltip" data-title="Більшості серверам дало відповідь, що ціль доступна, але вже деякі сервера не змогли її отримати. Розгорніть ціль для детальної інформації.">Ще ворушиться</span><span class="ml-3 target-arrow"><i class="fas fa-angle-down"></i></span>`;
					statusBlock.innerHTML = text;
				}
				
				else if (statusErr.length > statusOk.length) {
					const text = `<span class="copy">${statusBlock.textContent}</span><span class="status danger ml-auto" data-toggle="tooltip" data-title="Більшості серверам дало негативну відповідь по цій цілі.">Померла</span><span class="ml-3 target-arrow"><i class="fas fa-angle-down"></i></span>`;
					statusBlock.innerHTML = text;
				}


				else if (statusErr.length < 2 && statusOk.length < 2) {
					const text = `<span class="copy">${statusBlock.textContent}</span><span class="status warning ml-auto" data-toggle="tooltip" data-title="Щось пішло не так при перевірці цілі. Чекайте оновлення на наступному запиті.">Невдала</span>`;
					statusBlock.innerHTML = text;
				}

				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})


				


				statusOk = [];
				statusErr = [];
			})
		})
	});
	}


}


const getServices = async () => {
	let response = await fetch('services.json');

	if (response.ok) { 
		let json = await response.json();
		
		return json;

		}
}


getDomains();



</script>


<?php include("../includes/footer.php"); ?>


<script>

setTimeout(() => {

	const onlyAccess = document.getElementById('onlyAccess');
	const allTargetBtn = document.getElementById('allTargetBtn');
	const copyOnlyAccess = document.getElementById('copyOnlyAccess');
	const copyAllTarget = document.getElementById('copyAllTarget');
	const cardArr = document.querySelectorAll('.dashboard.card');

	const targetArr = [];

	cardArr.forEach(card => {
		if (card.children[0].children[0].children[0].children[1].textContent === 'Доступна' || card.children[0].children[0].children[0].children[1].textContent === 'Ще ворушиться' || card.children[0].children[0].children[0].children[1].textContent === 'Напівжива') {
			targetArr.push(`tcp://${card.children[0].children[0].children[0].children[0].textContent}`);
		}
	})

	copyOnlyAccess.children[0].textContent = targetArr.length;


	copyOnlyAccess.addEventListener('click', () => {
		const targetArr = [];
		cardArr.forEach(card => {
			if (card.children[0].children[0].children[0].children[1].textContent === 'Доступна' || card.children[0].children[0].children[0].children[1].textContent === 'Ще ворушиться' || card.children[0].children[0].children[0].children[1].textContent === 'Напівжива') {
				targetArr.push(`tcp://${card.children[0].children[0].children[0].children[0].textContent}`);
			}
		})

		copyIp(`<span>${targetArr.join(' ')}</span>`);
	})

	copyAllTarget.children[0].textContent = cardArr.length;

	copyAllTarget.addEventListener('click', () => {
		const targetArr = [];
		cardArr.forEach(card => {
			targetArr.push(`tcp://${card.children[0].children[0].children[0].children[0].textContent}`);
		})

		copyIp(`<span>${targetArr.join(' ')}</span>`);
	})

	allTargetBtn.children[0].textContent = cardArr.length;

	allTargetBtn.addEventListener('click', () => {
		cardArr.forEach(card => {
			card.style.display = 'flex';
		})
	})

	onlyAccess.children[0].textContent = targetArr.length;

	onlyAccess.addEventListener('click', () => {
		cardArr.forEach(card => {
			card.style.display = 'none';
			if (card.children[0].children[0].children[0].children[1].textContent === 'Доступна' || card.children[0].children[0].children[0].children[1].textContent === 'Ще ворушиться' || card.children[0].children[0].children[0].children[1].textContent === 'Напівжива') {
				card.style.display = 'flex';
			}
		})
	})

}, 500)


setTimeout(() => {	
const copyAddressBtn = document.querySelectorAll('.collapse-btn .copy');

copyAddressBtn.forEach(item => {
		item.addEventListener('click', (e) => {
			copyAdress(e.target);
			const text = e.target.textContent;
			e.target.textContent = 'Скіпійовано';

			setTimeout(() => {
				e.target.textContent = text;
			}, 1000);

		})
	})

}, 300)
</script>