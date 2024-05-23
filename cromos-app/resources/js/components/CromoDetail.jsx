import React from 'react';

const CromoDetail = ({ cromo, onClose }) => {
    console.log('Cromo recibido:', cromo); // Agregar este log para verificar los datos

    if (!cromo) return null;

    return (
        <div className="cromo-detail">
            <button onClick={onClose} className="close-button">Cerrar</button>
            {cromo.name && <h2>{cromo.name}</h2>}
            {cromo.image && <img src={cromo.image} alt={cromo.name} className="cromo-image" />}
            {cromo.description && <p>{cromo.description}</p>}
            {/* Agrega otros detalles del cromo aquí según sea necesario */}
        </div>
    );
};

export default CromoDetail;
