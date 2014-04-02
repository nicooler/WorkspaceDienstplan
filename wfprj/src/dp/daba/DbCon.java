/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package dp.daba;

/**
 *
 * @author misiu
 */
// needed sql imports
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public abstract class DbCon {

	public static Connection getConnection() {

		// hostname
		String dbHost = "i-intra-02.informatik.hs-ulm.de";

		// port - standard: 3306
		String dbPort = "3306";

		// database name
		String database = "dapro_wf4_02";

		// database user
		String dbUser = "dapro_wf4_02";

		// database password
		String dbPassword = "";

		Connection conn = null;

		// load the needed database driver from class com.mysql.jdbc.Driver
		try {
				// establishing the connection
			conn = DriverManager.getConnection("jdbc:mysql://" + dbHost + ":"
					+ dbPort + "/" + database, dbUser, dbPassword);
		} catch (SQLException e) {
			System.out.println("Connect not possible!");
		}
		// returning a connection object that can be used in other classes.
		// it includes the connection to the database server
		return conn;
	}
}
