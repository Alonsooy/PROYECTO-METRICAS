USE BUFFER_JIT;
/*DROP DATABASE BUFFER_JIT;*/
INSERT INTO usuarios (NOMBRE_USUARIO, TELEFONO, PASSWORD_USER, CORREO,DIA_CREACION)
VALUES
('Juan', '9981112233', '117', 'JUAN@gmail.com',NOW()),
('Alexis', '9982223344', '1234', 'ALEXIS@gmail.com',NOW());
INSERT INTO usuario_rol(ID_USUARIO,ID_ROL)
VALUES 
(1,1),
(2,2);

INSERT INTO PROVEEDORES (NOMBRE_PROVEEDOR, TELEFONO, RFC, CORREO)
VALUES
('ACEMEX', '9981112233', 'RFC123', 'contacto@acemex.com'),
('TORNIMEX', '9982223344', 'RFC456', 'ventas@tornimex.com'),
('SENSORTEC', '9983334455', 'RFC789', 'info@sensortec.com'),
('PROV-B', '9984445566', 'RFC101', 'proveedorb@correo.com');

INSERT INTO PRODUCTO (CODIGO_PRODUCTO, NOMBRE_PRODUCTO, DESCRIPCION, VALOR_UNITARIO, CATEGORIA_ABCD, DIA_REGISTRO, ID_PROVEEDOR)
VALUES
('SENS-O2-001', 'Sensor Oxígeno', 'Sensor de medición de oxígeno', 50000, 'A', '2024-03-15', '4'),
('TORN-M8-005', 'Tornillo M8x20', 'Tornillo estándar M8x20', 2, 'D', '2024-02-10', '2'),
('ABS-7890', 'Sensor ABS', 'Sensor de frenos ABS', 45000, 'A', '2024-01-22', '3'),
('MAP-4567', 'Sensor MAP', 'Sensor de presión MAP', 38000, 'C', '2024-03-05', '1'),
('JUNT-3321', 'Junta Culata', 'Junta para culata de motor', 1500, 'A', '2024-02-18', '1');

INSERT INTO INVENTARIO (STOCK_ACTUAL, ID_PRODUCTO)
VALUES
(100, 1),   -- Sensor Oxígeno
(5000, 2),  -- Tornillo M8x20
(75, 3),    -- Sensor ABS
(200, 4),   -- Sensor MAP
(500, 5);   -- Junta Culata

INSERT INTO MOVIMIENTOS (FECHA_MOVIMIENTO, CANTIDAD_MOVIMIENTO, TIPO_MOVIMIENTO, ID_USUARIO)
VALUES
('2024-03-15', 20, 'Ajuste Buffer', 1),
('2024-02-10', 1000, 'Ajuste Seguridad', 2),
('2024-01-22', 25, 'Solicitud Producción', 2);

INSERT INTO DETALLE_MOVIMIENTO (CANTIDAD, ID_MOVIMIENTO, ID_PRODUCTO)
VALUES
(20, 1, 1),   -- Ajuste Sensor Oxígeno
(1000, 2, 2), -- Ajuste Tornillo
(25, 3, 3);   -- Ajuste ABS