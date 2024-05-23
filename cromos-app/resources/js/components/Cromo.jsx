import React from 'react';
import { toast } from 'react-toastify';

const Cromo = ({ cromo }) => {
    const showCromoDetails = () => {
        toast.info(`Detalles del cromo: ${cromo.name} - ${cromo.description}`, {
            autoClose: 3000 // Cerrar automáticamente después de 3 segundos
        });
    };

    return (
        <div className="cromo-container" onClick={showCromoDetails}>
            <img src={cromo.image} alt={cromo.name} className="cromo-image" />
            <h3>{cromo.name}</h3>
            <p>{cromo.points} puntos</p>
        </div>
    );
};

export default Cromo;
