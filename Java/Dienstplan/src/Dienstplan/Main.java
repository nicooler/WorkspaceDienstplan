package Dienstplan;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.beans.Statement;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.*;

public class Main {

	private JFrame frmMain;
	
	static java.sql.Statement st;
	
	static ResultSet rs;
	static ResultSet rs2;


	public Main() throws SQLException {
		initialize();
	}


	private void initialize() throws SQLException {
		frmMain = new JFrame();
		frmMain.setTitle("Main");
		frmMain.setVisible(true);
		frmMain.setBounds(100, 100, 666, 600);
		frmMain.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frmMain.getContentPane().setLayout(null);
		
		JButton btnExit = new JButton("Logout");
		btnExit.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				Login start = new Login();
				start.setVisible(true);
				frmMain.setVisible(false);
			}
		});
		btnExit.setBounds(551, 527, 89, 23);
		frmMain.getContentPane().add(btnExit);
		
		JTabbedPane tabbedPane = new JTabbedPane(JTabbedPane.TOP);
		tabbedPane.setBounds(0, 0, 650, 516);
		frmMain.getContentPane().add(tabbedPane);
		
		JPanel panel = new JPanel();
		tabbedPane.addTab("Mitarbeiter", null, panel, null);
		panel.setLayout(null);
		
		JButton btnMitarbeiterHinzufuegen = new JButton("Mitarbeiter hinzufügen");
		btnMitarbeiterHinzufuegen.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				
//neue mitarbeiter hinzufügen
				MAhinzufuegen ma;
				ma = new MAhinzufuegen();
				ma.setVisible(true);
				setVisible(false);
			}
		});
		btnMitarbeiterHinzufuegen.setBounds(78, 172, 213, 126);
		panel.add(btnMitarbeiterHinzufuegen);
		
		JButton btnMitarbeiterBearbeiten = new JButton("Mitarbeiter bearbeiten");
		btnMitarbeiterBearbeiten.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				
				SearchEmp search = new SearchEmp();
				search.setVisible(true);
				frmMain.setVisible(false);
				
			}
		});
		btnMitarbeiterBearbeiten.setBounds(373, 172, 213, 126);
		panel.add(btnMitarbeiterBearbeiten);
		
		JPanel panel_3 = new JPanel();
		tabbedPane.addTab("Leer...", null, panel_3, null);
		panel_3.setLayout(null);
		
	}

	public void setVisible(boolean b) {
		
		
	}
	}
