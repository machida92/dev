public class MainPPE {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		PPE fenetre = new PPE();
		
		BddAccess bdd;
		bdd = new BddAccess();

		// Charger le driver
		bdd.chargerDriver();

		
		// Se connecter a la base de donnees
		bdd.bddConnect("achatenligne");
		bdd.bddConnect("achatenligne");
		
		// Creation de la requete
		bdd.creerRequete();
		
		fenetre.setRefBdd(bdd);
		bdd.setRefPPE(fenetre);
		
	
		

	}

}
