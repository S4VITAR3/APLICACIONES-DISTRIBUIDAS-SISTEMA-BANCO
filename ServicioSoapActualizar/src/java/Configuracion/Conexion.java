package Configuracion;

import java.sql.Connection;
import java.sql.DriverManager;

public class Conexion {
    
    Connection conn;
    
    public Conexion(){
        try{
            Class.forName("com.mysql.jdbc.Driver");
            //127.0.0.1
            conn = DriverManager.getConnection("jdbc:mysql://localhost/banco_aps?user=root&password=");
        }catch(Exception e){
           
        }
    }
    
    public Connection getConnection(){
        return conn;
    }
    
    public static void main(String[] args) {
        Conexion con = new Conexion();
        System.out.println(con.getConnection());
    }
}
