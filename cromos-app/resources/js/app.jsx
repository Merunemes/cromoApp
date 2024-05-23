// resources/js/app.jsx
import './bootstrap';
import '../css/app.css';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Counter from './components/Counter';
import BuyPackButton from './components/BuyPackButton';
import CollectionProgress from './components/CollectionProgress';
import ToastConfig from './components/ToastConfig';
import RandomPointsButton from './components/RandomPointsButton';
import Toasty from './components/Toasty';
import CuestionariosList from './components/CuestionariosList';
import ToastBuy from './components/ToastBuy';

const roots = {};

document.addEventListener('DOMContentLoaded', function() {
    const counterElement = document.getElementById('counter-app');

    if (counterElement) {
        const totalCromos = counterElement.getAttribute('data-total-cromos');
        const totalUsuarioCromos = counterElement.getAttribute('data-total-usuario-cromos');

        // Renderizamos el componente Counter dentro del div #counter-app
        roots.counter = ReactDOM.createRoot(counterElement);
        roots.counter.render(
            <Counter totalCromos={totalCromos} totalUsuarioCromos={totalUsuarioCromos} />
        );
    }

    const buyPackAppElement = document.getElementById('buy-pack-app');

    if (buyPackAppElement) {
        const userId = buyPackAppElement.getAttribute('data-user-id');
        const userPoints = buyPackAppElement.getAttribute('data-user-points');

        roots.buyPack = ReactDOM.createRoot(buyPackAppElement);
        roots.buyPack.render(
            <BuyPackButton userId={userId} userPoints={userPoints} />
        );
    }

    const collectionProgressElement = document.getElementById('collection-progress');

    if (collectionProgressElement) {
        const totalCromos = collectionProgressElement.getAttribute('data-total-cromos');
        const collectedCromos = collectionProgressElement.getAttribute('data-collected-cromos');

        roots.collectionProgress = ReactDOM.createRoot(collectionProgressElement);
        roots.collectionProgress.render(
            <CollectionProgress totalCromos={parseInt(totalCromos)} collectedCromos={parseInt(collectedCromos)} />
        );
    }

  
    const cromoDetailAppElement = document.getElementById('cromo-detail-app');

    if (cromoDetailAppElement) {
        roots.cromoDetail = ReactDOM.createRoot(cromoDetailAppElement);

        document.addEventListener('cromoSelected', function(event) {
            const cromo = event.detail;

            roots.cromoDetail.render(
                <CromoDetail cromo={cromo} onClose={() => {
                    roots.cromoDetail.render(null);
                }} />
            );
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const toastConfigElement = document.getElementById('toast-config');

    if (toastConfigElement) {
        ReactDOM.createRoot(toastConfigElement).render(
            <ToastConfig />
        );
    }

    // Aquí puedes agregar más renderizaciones de componentes según necesites
});


const randomPointsButtonElement = document.getElementById('random-points-button');

if (randomPointsButtonElement) {
    ReactDOM.createRoot(randomPointsButtonElement).render(<RandomPointsButton />);
}


const toastyElement = document.getElementById('toasty-component');

if (toastyElement) {
    ReactDOM.createRoot(toastyElement).render(<Toasty />);
}


const cuestionariosListElement = document.getElementById('cuestionarios-list');
if (cuestionariosListElement) {
    const cuestionarios = JSON.parse(cuestionariosListElement.getAttribute('data-cuestionarios'));
    ReactDOM.createRoot(cuestionariosListElement).render(<CuestionariosList cuestionarios={cuestionarios} />);
}
