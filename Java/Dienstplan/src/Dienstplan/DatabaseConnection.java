package Dienstplan;

import java.sql.*;
import java.sql.Statement;

import javax.swing.JOptionPane;


public abstract class DatabaseConnection {
	static Statement st = null;
	

    // returns a Connection Object of our Database
    public static Connection getConnection() {

    	     
        String intraUrl = "jdbc:mysql://85.13.149.241:3306/"; // intra MySQL server
        String localUrl = "jdbc:mysql://localhost:3306/"; // local MySQL server
        String db = "d00e632c"; // Database name
        String user = "d00e632c"; // a user on this db
        String pw = "computer"; // his password
        
        Connection connect = null;
        
        try {
          
            // Connection
            connect = DriverManager.getConnection(intraUrl + db, user, pw );
            connect.setAutoCommit(true);
            st = connect.createStatement();
            
      

        // Error: Connection failed    
        } catch (SQLException e) {
        	JOptionPane.showMessageDialog(null, "Connection to database failed da ist was falsch", "Information", JOptionPane.INFORMATION_MESSAGE);
            System.exit(0);
        // other Errors    
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, "Unexpected error.", "Information", JOptionPane.INFORMATION_MESSAGE);
            System.exit(0);
        }
        return connect;      
    }
   
 }
    
