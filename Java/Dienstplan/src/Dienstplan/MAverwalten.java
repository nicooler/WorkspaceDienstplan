package Dienstplan;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.DefaultComboBoxModel;
import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;
import javax.swing.border.EmptyBorder;
import javax.swing.JSpinner;
import javax.swing.SpinnerNumberModel;
import javax.swing.SwingConstants;

public class MAverwalten extends JFrame {
	
	private JPanel contentPane;
	private JTextField txtVorname;
	private JTextField txtNachname;
	private JTextField txtStrasse;
	private JTextField txtOrt;
	private JTextField txtGebDat;
	private JTextField txtTelefonNr;
	private JTextField txtBeschaeftigungsgrad;
	
	private int wid;
	static ResultSet rs; 
	private JTextField txtJahr;
	private JSpinner spinnerMonat;
	private JSpinner spinnerTag;
	private JTextField txtRolle;
	private JTextField txtBenutzername;

	public MAverwalten(int id){
		
		wid = id;
		
		setTitle("Mitarbeiter verwalten");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 545, 475);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		
		//Buttons
		JButton maHinzufuegen = new JButton("Mitarbeiter loeschen");
		maHinzufuegen.addActionListener(new ActionListener(){
		public void actionPerformed(ActionEvent e){
			/*Autor Dominik Witka
			 * 
			 */
			try{
				
				DatabaseConnection.getConnection();
				java.sql.Statement st = DatabaseConnection.st;
				
					
				String sqlInsert = ("DELETE FROM Mitarbeiter WHERE MA_Id="+wid+";");
				
				st.executeUpdate(sqlInsert);
				 st.close(); 
				 
				Main main = new Main();
				main.setVisible(true);
				setVisible(false);
				 
		        }
				catch (Exception ex) {
			        JOptionPane.showMessageDialog(null, "Beim l�schen ist ein Fehler aufgetreten","Information", JOptionPane.INFORMATION_MESSAGE); 

			        }
			
		}});
		
		maHinzufuegen.setBounds(33, 370, 157, 23);
		contentPane.add(maHinzufuegen);	
		
		JButton speichern = new JButton("Speichern");
		speichern.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e){
				
				try {
					changeworker();
				} catch (Exception e1) {
					e1.printStackTrace();
				}
			}});
		
		speichern.setBounds(320, 370, 145, 23);
		contentPane.add(speichern);
		
		JButton button = new JButton("Zurueck");
		button.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				
				Main main;
				try {
					main = new Main();
					main.setVisible(true);
					setVisible(false);
				} catch (SQLException e) {
					e.printStackTrace();
				}

			}
		});
		button.setBounds(210, 390, 89, 23);
		contentPane.add(button);
		
		
		
		//Beschriftung
		JLabel lblVorname = new JLabel("Vorname:");
		lblVorname.setBounds(10, 85, 46, 14);
		contentPane.add(lblVorname);
		
		JLabel lblNachname = new JLabel("Nachname:");
		lblNachname.setBounds(10, 110, 99, 14);
		contentPane.add(lblNachname);
		
		JLabel lblStrasse = new JLabel("Strasse:");
		lblStrasse.setBounds(10, 135, 71, 14);
		contentPane.add(lblStrasse);
		
	    JLabel lblGebDat = new JLabel("Ort:"); 
		lblGebDat.setBounds(10, 160, 71, 14);
		contentPane.add(lblGebDat);
		
		JLabel lblGeburtsdatum = new JLabel("Geburtsdatum:");
		lblGeburtsdatum.setBounds(10, 185, 121, 14);
		contentPane.add(lblGeburtsdatum);
		
		JLabel lblTelefonNr = new JLabel("Telefon:");
		lblTelefonNr.setBounds(10, 210, 71, 14);
		contentPane.add(lblTelefonNr);
		
		JLabel lblBeschaeftigungsgrad = new JLabel("Beschaeftigungsgrad:");
		lblBeschaeftigungsgrad.setBounds(10, 235, 121, 14);
		contentPane.add(lblBeschaeftigungsgrad);
		
		JLabel lvlBenutzername = new JLabel("Benutzername:");
		lvlBenutzername.setBounds(10, 263, 121, 14);
		contentPane.add(lvlBenutzername);
		
		JLabel lvlRolle = new JLabel("Rolle:");
		lvlRolle.setBounds(10, 288, 46, 14);
		contentPane.add(lvlRolle);
		
		
		
		
		//Textfelder
		txtVorname = new JTextField();
		txtVorname.setBounds(152, 82, 313, 20);
		contentPane.add(txtVorname);
		txtVorname.setColumns(10);
		
		txtNachname = new JTextField();
		txtNachname.setBounds(152, 107, 313, 20);
		contentPane.add(txtNachname);
		txtNachname.setColumns(10);
		
		txtTelefonNr = new JTextField();
		txtTelefonNr.setBounds(152, 207, 313, 20);
		contentPane.add(txtTelefonNr);
		txtTelefonNr.setColumns(10);
		
		txtBeschaeftigungsgrad = new JTextField();
		txtBeschaeftigungsgrad.setBounds(152, 232, 313, 20);
		contentPane.add(txtBeschaeftigungsgrad);
		txtBeschaeftigungsgrad.setColumns(10);
		
		txtStrasse = new JTextField();
		txtStrasse.setColumns(10);
		txtStrasse.setBounds(152, 132, 313, 20);
		contentPane.add(txtStrasse);
		
		txtOrt = new JTextField();
		txtOrt.setColumns(10);
		txtOrt.setBounds(152, 157, 313, 20);
		contentPane.add(txtOrt);
		
		txtRolle = new JTextField();
		txtRolle.setColumns(10);
		txtRolle.setBounds(152, 285, 313, 20);
		contentPane.add(txtRolle);
		
		txtBenutzername = new JTextField();
		txtBenutzername.setColumns(10);
		txtBenutzername.setBounds(152, 260, 313, 20);
		contentPane.add(txtBenutzername);
		
		
		//Datum mit JSpinner
		spinnerMonat = new JSpinner();
		spinnerMonat.setModel(new SpinnerNumberModel(1, 1, 12, 1));
		spinnerMonat.setBounds(276, 182, 46, 20);
		contentPane.add(spinnerMonat);
		
		JLabel lblMonat = new JLabel("Monat");
		lblMonat.setBounds(332, 185, 59, 14);
		contentPane.add(lblMonat);
		
		spinnerTag = new JSpinner();
		spinnerTag.setModel(new SpinnerNumberModel(1, 1, 31, 1));
		spinnerTag.setBounds(388, 182, 46, 20);
		contentPane.add(spinnerTag);
		
		JLabel lblTag = new JLabel("Tag");
		lblTag.setBounds(444, 185, 33, 14);
		contentPane.add(lblTag);
		
		txtJahr = new JTextField();
		txtJahr.setHorizontalAlignment(SwingConstants.RIGHT);
		txtJahr.setBounds(152, 182, 71, 20);
		contentPane.add(txtJahr);
		txtJahr.setColumns(10);
		
		JLabel lblJahr = new JLabel("Jahr");
		lblJahr.setBounds(233, 185, 33, 14);
		contentPane.add(lblJahr);
		

	
	setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	setVisible(true);
	/*Autor Dominik Witka
	 * 
	 */
	try{ // laden der daten
        DatabaseConnection.getConnection();
        java.sql.Statement st = DatabaseConnection.st;
        

        String sqlread = "SELECT Vorname, Nachname, GebDatum, Strasse, Ort, TelefonNr, Beschaeftigungsgrad, Benutzername, Passwort, Rolle from Mitarbeiter where MA_Id = "+ wid; 
        rs = st.executeQuery(sqlread);

        while(rs.next())
		{

		 	txtVorname.setText(rs.getString("Vorname"));
		 	txtNachname.setText(rs.getString("Nachname"));
		 	txtStrasse.setText(rs.getString("GebDatum"));
		 	txtOrt.setText(rs.getString("Strasse"));
		 	txtJahr.setText(rs.getString("Ort"));
		 	txtTelefonNr.setText(rs.getString("TelefonNr"));
		 	txtBeschaeftigungsgrad.setText(rs.getString("Beschaeftigungsgrad"));
		 	txtBenutzername.setText(rs.getString("Benutzername"));
		 	txtBenutzername.setText(rs.getString("Rolle"));
		 	
        	String sdate = rs.getString("GebDatum").substring(0,4);
        	txtJahr.setText(sdate);
        	int ddate = 0;
        	ddate = Integer.parseInt(rs.getString("GebDatum").substring(5,7));
        	spinnerMonat.setValue(ddate);
        	ddate = Integer.parseInt(rs.getString("GebDatum").substring(8,10));
        	spinnerTag.setValue(ddate);
		}
        
        
        }
        catch (Exception ex) {
        
        }
        
        setVisible(false);
    } 
	
	
	
	
	public void changeworker() throws Exception{
		/*Autor Dominik Witka
		 * 
		 */
		try{
			
		DatabaseConnection.getConnection();
		java.sql.Statement st = DatabaseConnection.st;
		
		
		String day = "";
		String month = "";
		//wir brauchen eine zweistellige zahl bei monat und tag
		if ((int)spinnerMonat.getValue() < 10) month ="0" + spinnerMonat.getValue(); else month = spinnerMonat.getValue()+""; 
		if ((int)spinnerTag.getValue() < 10) day ="0" + spinnerTag.getValue(); else day = spinnerTag.getValue()+"";
		
		// lesen der textfelder
		String WForename = txtVorname.getText();
		String WSurename = txtNachname.getText();
		String WStreet = txtStrasse.getText();
		String WCity = txtOrt.getText();
		String WBirthday = txtJahr.getText() + "-" + month + "-" + day;
		String WPhone = txtTelefonNr.getText();
		String WActivitylvl = txtBeschaeftigungsgrad.getText();
		String WUsername = txtBenutzername.getText();
		String WRole = txtRolle.getText();
		
	

		// schreiben der sql anweisung "mitarbeiteranlegen"
		String sqlInsert = "UPDATE Mitarbeiter SET Vorname='"+WForename+"', Nachname='"+WSurename+"', GebDatum='"+WBirthday+"', Strasse='"+WStreet+"', Ort='"+WCity+
				"', TelefonNr='"+WPhone+"', Beschaeftigungsgrad='"+WActivitylvl+"', Benutzername='"+WUsername+"', Benutzername='"+WRole+ "' WHERE MA_Id="+wid+";";

		
		
		//sql anweisung senden
		st.executeUpdate(sqlInsert);
		 st.close(); 
		
		 // zur�cksetzen der daten damit nicht 2x angelegt werden kann
		 	spinnerMonat.setValue(1);
		 	spinnerTag.setValue(1);
		 	txtVorname.setText("");
		 	txtNachname.setText("");
		 	txtStrasse.setText("");
		 	txtOrt.setText("");
		 	txtJahr.setText("");
		 	txtTelefonNr.setText("");
		 	txtBeschaeftigungsgrad.setText("");
		 	txtBenutzername.setText("");
		 	txtBenutzername.setText("");
		 
		 
		}
		catch (Exception ex) {
	        JOptionPane.showMessageDialog(null, "Beim �ndern ist ein Fehler aufgetreten.","Information", JOptionPane.INFORMATION_MESSAGE); 
	            Main main = new Main(); 
	            setVisible(false); 
	        }
		
		
		
		
		
	
	}
	
	
}
