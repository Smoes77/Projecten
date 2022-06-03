const discord = require("discord.js");

module.exports.run = async (client, message, args) => {

    if (!message.member.permissions.has("KICK_MEMBERS")) return message.reply("Je hebt niet de benodigde permissie voor deze command!");

    if (!message.guild.me.permissions.has("KICK_MEMBERS")) return message.reply("Bot heeft geen perms");

    if (!args[0]) return message.reply("Je hebt geen gebruikersnaam gegeven.");

    if (!args[1]) return message.reply("Je hebt geen reden gegeven.");

    var banUser = message.guild.members.cache.get(message.mentions.users.first().id) || message.guild.members.get(args[0].id)

    if (!banUser) return message.reply("Kan deze gebruiker niet vinden.");

    if (banUser.permissions.has("MANAGE_MESSAGES")) return message.reply("Kan deze gebruiker niet bannen");

    var reason = args.slice(1).join(" ");

    var embedPrompt = new discord.MessageEmbed()
    .setColor("YELLOW")
    .setTitle("Reageer binnen 30 sec alstublief dankuwel")
    .setDescription(`Wil je ${banUser} bannen?`);

    var embed = new discord.MessageEmbed()
    .setColor("DARK_BUT_NOT_BLACK")
    .setDescription(`**Geband** ${banUser} (${banUser.id})
    **Geband door:** ${message.author}
    **Reden:** ${reason}`)
    .setFooter(message.member.displayName)
    .setTimestamp();

    message.channel.send({ embeds: [embedPrompt] }).then(async msg => {
 
        let authorID = message.author.id;
        let time = 30;
        let reactions = ["✅", "❌"];
     
        // We gaan eerst de tijd * 1000 doen zodat we seconden uitkomen.
        time *= 1000;
     
        // We gaan iedere reactie meegegeven onder de reactie en deze daar plaatsen.
        for (const reaction of reactions) {
            await msg.react(reaction);
        }
     
        // Als de emoji de juiste emoji is die men heeft opgegeven en als ook de auteur die dit heeft aangemaakt er op klikt
        // dan kunnen we een bericht terug sturen.
        const filter = (reaction, user) => {
            return reactions.includes(reaction.emoji.name) && user.id === authorID;
        };
     
        // We kijken als de reactie juist is, dus met die filter en ook het aantal keren en binnen de tijd.
        // Dan kunnen we bericht terug sturen met dat icoontje dat is aangeduid.
        msg.awaitReactions({ filter, max: 1, time: time }).then(collected => {
            var emojiDetails = collected.first();

            if(emojiDetails.emoji.name == "✅") {

                msg.delete();

                banUser.ban({reason: reason }).catch(err => {
                    if (err) return message.channel.send(`Er is iets foutgegaan`);
                });
                
                message.channel.send({ embeds: [embed] });
                
            }else if (emojiDetails.emoji.name == "❌") {

                msg.delete();

                message.channel.send("Ban geanulleerd").then(msg => {
                    message.delete();
                    setTimeout(() => msg.delete(), 5000);
                });

            }
     
            
        });
    });

}

module.exports.help = {
    name: "ban",
    category: "admin",
    description: "Bant member als die de regels overtreedt!"
    
}