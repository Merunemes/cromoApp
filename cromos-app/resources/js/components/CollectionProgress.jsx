import React from 'react';

const CollectionProgress = ({ totalCromos, collectedCromos }) => {
    const progress = (collectedCromos / totalCromos) * 100;

    return (
        <div className="bg-blue-500 h-6 rounded-full opacity-10" style={{ width: `${progress}%` }}>
        <div className="w-full bg-gray-200 rounded-full h-6 dark:bg-gray-700">
           </div>
            <p className="text-center mt-2">{collectedCromos} de {totalCromos} cromos recolectados</p>
        </div>
    );
};

export default CollectionProgress;
