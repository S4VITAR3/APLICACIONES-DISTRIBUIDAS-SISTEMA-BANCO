package CapaDatos;

import Configuracion.Conexion;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class Consultas_MYSQL implements Metodos{
    
    PreparedStatement ps;
    ResultSet rs; 
    Connection conn;
    Conexion conex= new Conexion();
    int res;
    boolean  flag;
    
    @Override
    public boolean update(int numero_cuenta, String nombre, String apellido_paterno, String apellido_materno, String username, int nip) {
        String sql = "UPDATE usuarios SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, username = ?, nip = ? WHERE numero_cuenta = ?";
        try{
            conn = conex.getConnection();
            ps = conn.prepareStatement(sql);
            ps.setString(1, nombre);
            ps.setString(2, apellido_paterno);
            ps.setString(3, apellido_materno);
            ps.setString(4, username);
            ps.setInt(5, nip);
            ps.setInt(6, numero_cuenta);
            res= ps.executeUpdate();          
            if(res==1){
                flag = true;
            } else{
                flag = false;
            }           
        }catch(Exception e){
            
        }
        return flag;
    }
}
