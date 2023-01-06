package com.rest.capadatos;

import com.rest.configuracion.Conexion;
import com.rest.interfaces.Metodos;
import com.rest.interfaces.Usuarios;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class UsuariosDAO implements Metodos {

    PreparedStatement ps;
    ResultSet rs;
    Connection conn;
    Conexion conex = new Conexion();
    int res;

    @Override
    public List<Usuarios> login(int no_cuenta, int nip) {
        List<Usuarios> datos = new ArrayList<Usuarios>();
        int activo = 0;
        String estado = "SELECT estado FROM usuarios WHERE numero_cuenta = ? and nip = ?";
        try {
            conn = conex.getConnection();
            ps = conn.prepareStatement(estado);
            ps.setInt(1, no_cuenta);
            ps.setInt(2, nip);
            rs = ps.executeQuery();
            while (rs.next()) {
                activo = rs.getInt("estado");
            }
        } catch (Exception e) {

        }

        if (activo == 1) {
            String sql = "select * from usuarios where numero_cuenta = ? and nip = ?";
            try {
                conn = conex.getConnection();
                ps = conn.prepareStatement(sql);
                ps.setInt(1, no_cuenta);
                ps.setInt(2, nip);
                rs = ps.executeQuery();
                while (rs.next()) {
                    Usuarios usuario = new Usuarios();
                    usuario.setNumero_cuenta(rs.getInt("numero_cuenta"));
                    usuario.setNombre(rs.getString("nombre"));
                    usuario.setApellido_paterno(rs.getString("apellido_paterno"));
                    usuario.setApellido_materno(rs.getString("apellido_materno"));
                    usuario.setUsername(rs.getString("username"));
                    usuario.setNip(rs.getInt("nip"));
                    usuario.setRol(rs.getString("rol"));
                    usuario.setEstado(rs.getInt("estado"));
                    datos.add(usuario);
                }
            } catch (Exception e) {

            }
        }
        return datos;
    }

    @Override
    public boolean agregarUsuario(int numCuenta, String nombre, String apellido_pa, String apellido_ma, String username, int nip, String rol) {
        String sql = "INSERT INTO usuarios(numero_cuenta,nombre,apellido_paterno,apellido_materno,username,nip,rol,estado) VALUES (?,?,?,?,?,?,?,1)";
        boolean flag = false;
        try {
            conn = conex.getConnection();
            ps = conn.prepareStatement(sql);
            ps.setInt(1, numCuenta);
            ps.setString(2, nombre);
            ps.setString(3, apellido_pa);
            ps.setString(4, apellido_ma);
            ps.setString(5, username);
            ps.setInt(6, nip);
            ps.setString(7, rol);

            res = ps.executeUpdate();
            if (res == 1) {
                flag = true;
            }

        } catch (Exception e) {

        }
        return flag;
    }

    @Override
    public boolean depositarUsuarioNuevo(int numCuenta, double cantidad) {
        String sql = "INSERT INTO capital(monto_neto,numero_cuenta) VALUES (?,?)";
        boolean flag = false;

        try {
            conn = conex.getConnection();
            ps = conn.prepareStatement(sql);
            ps.setDouble(1, cantidad);
            ps.setInt(2, numCuenta);

            res = ps.executeUpdate();
            if (res == 1) {
                flag = true;
            }
        } catch (Exception e) {

        }
        return flag;
    }

    @Override
    public double consultarSaldo(int numCuenta) {
        String sql = "SELECT monto_neto FROM capital WHERE numero_cuenta = ?";
        double saldo = 0;

        try {
            conn = conex.getConnection();
            ps = conn.prepareStatement(sql);
            ps.setInt(1, numCuenta);
            rs = ps.executeQuery();

            while (rs.next()) {
                saldo = rs.getDouble("monto_neto");
            }
        } catch (Exception e) {

        }
        return saldo;
    }

    @Override
    public boolean retirarSaldo(int numcuenta, double cantidad) {
        String sql = "SELECT monto_neto FROM capital where numero_cuenta = ?";
        boolean flag = false;
        double monto = 0;
        try {
            conn = conex.getConnection();
            ps = conn.prepareStatement(sql);
            ps.setInt(1, numcuenta);
            rs = ps.executeQuery();

            while (rs.next()) {
                monto = rs.getDouble("monto_neto");
            }

        } catch (SQLException e) {

        }

        if (monto > 0) {
            if (monto >= cantidad) {
                String sql2 = "UPDATE capital SET monto_neto = ? WHERE numero_cuenta = ?";
                monto = monto - cantidad;
                try {
                    conn = conex.getConnection();
                    ps = conn.prepareStatement(sql2);
                    ps.setDouble(1, monto);
                    ps.setInt(2, numcuenta);
                    res = ps.executeUpdate();
                    if (res == 1) {
                        flag = true;
                    }
                } catch (Exception e) {

                }
            }
        }

        return flag;
    }

    @Override
    public boolean realizarTransferencia(int remitente, int destinatario, double monto) {
        String sql = "SELECT monto_neto FROM capital WHERE numero_cuenta = ?";
        double monto_neto = 0;
        boolean flag = false;
        try {
            conn = conex.getConnection();
            ps = conn.prepareStatement(sql);
            ps.setInt(1, remitente);
            rs = ps.executeQuery();

            while (rs.next()) {
                monto_neto = rs.getDouble("monto_neto");
            }
        } catch (Exception e) {

        }

        if (monto_neto > 0) {
            if (monto_neto >= monto) {
                String sql2 = "UPDATE capital SET monto_neto = ? WHERE numero_cuenta = ?";
                try {
                    conn = conex.getConnection();
                    ps = conn.prepareStatement(sql2);
                    monto_neto = monto_neto - monto;
                    ps.setDouble(1, monto_neto);
                    ps.setInt(2, remitente);
                    res = ps.executeUpdate();
                    if (res == 1) {
                        flag = true;
                    }
                } catch (Exception e) {

                }

                String sql3 = "SELECT monto_neto FROM capital WHERE numero_cuenta = ?";
                double monto_destinatario = 0;
                try {
                    conn = conex.getConnection();
                    ps = conn.prepareStatement(sql3);
                    ps.setInt(1, destinatario);
                    rs = ps.executeQuery();

                    while (rs.next()) {
                        monto_destinatario = rs.getDouble("monto_neto");
                    }
                } catch (Exception e) {

                }

                String sql4 = "UPDATE capital SET monto_neto = ? WHERE numero_cuenta = ?";
                try {
                    conn = conex.getConnection();
                    ps = conn.prepareStatement(sql2);
                    monto_destinatario = monto_destinatario + monto;
                    ps.setDouble(1, monto_destinatario);
                    ps.setInt(2, destinatario);
                    res = ps.executeUpdate();
                    if (res == 1) {
                        flag = true;
                    }
                } catch (Exception e) {

                }

                String sql5 = "INSERT INTO movimientos(monto,destinatario,remitente) VALUES (?,?,?)";
                try {
                    conn = conex.getConnection();
                    ps = conn.prepareStatement(sql5);
                    ps.setDouble(1, monto);
                    ps.setInt(2, destinatario);
                    ps.setInt(3, remitente);
                    res = ps.executeUpdate();
                    if (res == 1) {
                        flag = true;
                    }
                } catch (Exception e) {

                }

            }
        }
        return flag;
    }

    @Override
    public List<Usuarios> listarUsuarios() {
        String sql = "SELECT * FROM usuarios WHERE rol = 'Cliente'";
        List<Usuarios> datos = new ArrayList<Usuarios>();
        try {
            conn = conex.getConnection();
            ps = conn.prepareStatement(sql);
            rs = ps.executeQuery();
            while (rs.next()) {
                Usuarios usuario = new Usuarios();
                usuario.setNumero_cuenta(rs.getInt("numero_cuenta"));
                usuario.setNombre(rs.getString("nombre"));
                usuario.setApellido_paterno(rs.getString("apellido_paterno"));
                usuario.setApellido_materno(rs.getString("apellido_materno"));
                usuario.setUsername(rs.getString("username"));
                usuario.setNip(rs.getInt("nip"));
                usuario.setRol(rs.getString("rol"));
                usuario.setEstado(rs.getInt("estado"));
                datos.add(usuario);
            }
        } catch (Exception e) {

        }
        return datos;
    }

}
